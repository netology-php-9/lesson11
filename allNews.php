<?php
header("Content-Type: text/html; charset=utf-8");
require_once ('news.php');

$news = new AllNews();
$news->printNews();
