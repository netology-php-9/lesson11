<?php
$cache_time = 360;
$cache_file = __DIR__ . "/cache/cache.php";
if (file_exists($cache_file)) {

    if ((time() - $cache_time) < filemtime($cache_file)) {

        echo file_get_contents($cache_file);
        exit;
    }
}
ob_start();