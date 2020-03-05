<?php

declare(strict_types=1);

use Ds\Linear\Set\Set;

require __DIR__ . '/../../vendor/autoload.php';

$map1 = new Set();
$map1->add(1);
$map1->add(2);
$map1->add(3);
$map1->delete(3);

$map2 = new Set();
$map2->add(1);
$map2->add(2);
$map2->add(6);
$map2->add(8);

/*
    array(2) {
        [1] => bool(true)
        [2] => bool(true)
    }
*/
$map3 = $map1->intersect($map2);

/*
    array(4) {
        [1] => bool(true)
        [2] => bool(true)
        [6] => bool(true)
        [8] => bool(true)
    }
*/
$map4 = $map1->union($map2);
