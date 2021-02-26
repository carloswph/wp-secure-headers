<?php
error_reporting(-1);

use WPH\Security\Headers;

require __DIR__ . '/vendor/autoload.php';

$tr = new Headers();
$tr->setCSP();
print_r($tr->toApply);