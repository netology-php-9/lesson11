<?php


class Conf
{

    protected $path;

    function getPath($class)
    {
        $this->path = __DIR__ . '/' . $class . '.txt';
        return $this->path;
    }


}