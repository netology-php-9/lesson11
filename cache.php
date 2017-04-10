<?php

class Cache extends Conf
{

    private $cache_time = 360;

    public function readCache()
    {


        if (file_exists($this->getCachePath())) {

            if ((time() - $this->cache_time) < filemtime($this->getCachePath())) {

                echo file_get_contents($this->getCachePath());
                exit;
            }
        }
        ob_start();
    }

    public function writeCache()
    {
        file_put_contents($this->getCachePath(), ob_get_contents());
        ob_end_flush();
    }
}