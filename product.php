<?php
require('conf.php');
require_once('log.php');
require_once('cache.php');


class Product extends Log
{

    protected $count = 1;
    protected $price;
    protected $discount = 10;
    protected $delivery = 250;

    protected function getPrice($price)
    {
        $this->price = $price * $this->count + $this->getDelivery();

        $this->write();
        return $this->price;
    }

    protected function getPriceWithDiscount($price)
    {
        $this->price = (($price * $this->count) / $this->discount) + $this->setDelivery(300);

        $this->write();
        return $this->price;
    }

    protected function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        $this->write();
        return $this->delivery;
    }

    protected function getDelivery()
    {
        $this->write();
        return $this->delivery;
    }
}

interface SetPrice
{
    public function setPrice($value);
}

class Food extends Product implements SetPrice
{

    public function setPrice($weight)
    {

        $this->count = $weight;
        $this->write();
        if ($this->count > 10) {

            echo 'Цена продуктов ' . $this->getPriceWithDiscount(15);
        } else {
            echo 'Цена продуктов ' . $this->getPrice(15);
        }
    }
}

class Technology extends Product implements SetPrice
{

    public function setPrice($count)
    {
        $this->write();
        $this->count = $count;
        echo 'Цена техники ' . $this->getPriceWithDiscount(80000);

    }
}

class House extends Product implements SetPrice
{

    public function setPrice($count)
    {
        $this->write();
        $this->count = $count;
        echo 'Цена здания ' . $this->getPriceWithDiscount(2000000);

    }
}

$cache = new Cache();
$cache->readCache();

$food = new Food();
$food->setPrice(9);
echo '<br>';
$technology = new Technology();
$technology->setPrice(3);
echo '<br>';
$technology = new House();
$technology->setPrice(2);

$cache->writeCache();