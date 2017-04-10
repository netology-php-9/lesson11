<?php
header("Content-Type: text/html; charset=utf-8");

class RealWorld {

    private $name;
    /*private $color;
    private $form;
    private $taste;
    private $colorInside;
    private $type;*/

    public function __construct($name)
    {
        $this->setData($name);
    }

    private function setData ($name) {
        $this->name = $name;

        $this->getData();

    }

    private function getData () {
        echo '<h3>' . $this->name . '</h3>';
    }
}

class Car extends RealWorld {

    private $price = 1000000;

    public function printPrice()
    {
        echo 'Цена ' . $this->price;
    }

}

class Tree extends RealWorld {

    private $years = 80;

    public function printYears()
    {
        echo 'Лет ' . $this->years;
    }


}

class Rock extends RealWorld {

    private $weight;
    public function setWeight($weight) {
        echo 'Вес ' . $this->weight = $weight . ' кг';
    }

}

class Animal extends RealWorld {

    private $sound;

    public function setSound($sound) {
        echo 'Это животное издает звук ' . $this->sound = $sound;
    }

}

class Penguin extends RealWorld {

    private $color = 'чернобелый';

    public function printColor() {
        echo 'Пингвин ' . $this->color;
    }

}

$car = new Car('машина');
$car->printPrice();

$tree = new Tree('дерево');
$tree->printYears();

$rock = new Rock('камень');
$rock->setWeight(0.5);

$animal = new Animal('кот');
$animal->setSound('mew');

$penguin = new Penguin('пингвин');
$penguin->printColor();



echo '<br><br><a href="allNews.php"> Новости </a><br>';
echo '<a href="product.php"> Продукты </a>';
