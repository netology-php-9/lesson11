<?php


class Cache extends Conf
{

    private $cache_time = 360;

    public function readCache()
    {

        if (file_exists($this->getPath())) {

            if ((time() - $this->cache_time) < filemtime($this->getPath())) {

                echo file_get_contents($this->getPath());
                exit;
            }
        }
        ob_start();
    }

    public function writeCache()
    {
        file_put_contents($this->getPath(), ob_get_contents());
        ob_end_flush();
    }
}