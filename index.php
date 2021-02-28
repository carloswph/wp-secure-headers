<?php
error_reporting(-1);

use WPH\Security\Headers;

require __DIR__ . '/vendor/autoload.php';

$a = [101, 102, 113, 124];
$b = [101, 113, 123, 145, 167];

//$d = array_intersect($a, $b);
//$d = array_unique(array_merge($a, $b));
$d = array_diff($b, $a);
$e = array_unique($d);

echo '<pre>' , print_r($d) , '</pre>';
