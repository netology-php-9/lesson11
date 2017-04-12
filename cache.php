<?php


class Cache extends Conf
{

    private $cache_time = 360;

    public function readCache()
    {

        if (file_exists($this->getPath('Cache'))) {

            if ((time() - $this->cache_time) < filemtime($this->getPath('Cache'))) {

                echo file_get_contents($this->getPath('Cache'));
                exit;
            }
        }
        ob_start();
    }

    public function writeCache()
    {
        file_put_contents($this->getPath('Cache'), ob_get_contents());
        ob_end_flush();
    }
}