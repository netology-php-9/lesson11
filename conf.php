<?php


class Conf
{

    protected $path;

    public function getPath()
    {
        if (get_called_class() === 'Cache') {
            $this->path = __DIR__ . '/Cache.txt';
        } else {
            $this->path = __DIR__ . '/Log.txt';
        }
        return $this->path;


    }
}