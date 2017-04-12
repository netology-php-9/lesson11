<?php


class Log extends Conf
{


    public function write()
    {

        ob_start();
        debug_print_backtrace();
        $callMethod = ob_get_clean();

        file_put_contents($this->getPath('Log'), $callMethod, FILE_APPEND);

    }

}