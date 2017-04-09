<?php

class Conf
{

    protected $path;

    protected function getPath()
    {
        $this->path = __DIR__ . '/log.txt';
        return $this->path;
    }
}