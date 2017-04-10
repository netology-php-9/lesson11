<?php
file_put_contents($cache_file, ob_get_contents());
ob_end_flush();