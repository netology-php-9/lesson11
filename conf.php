<?php

class Conf
{

    protected $logPath;
    protected $cachePath;

    protected function getLogPath()
    {
        $this->logPath = __DIR__ . '/log.txt';
        return $this->logPath;
    }

    public function getCachePath()
    {
        $this->cachePath = __DIR__ . '/cache.txt';
        return $this->cachePath;
    }


}