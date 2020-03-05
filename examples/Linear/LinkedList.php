<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Ds\Linear\LinkedList\LinkedList;
use Ds\Linear\LinkedList\Node;

$list = new LinkedList();
$list->addToHead(1);
$list->addToHead(2);
$list->addToHead(3);
$list->addToHead(4);

$list->addToEnd(9);
$list->addToHead(10);

$list->addAfter(12, 3);

/** @var Node $node */
foreach ($list->iterate() as $node) {
    echo $node->property . \PHP_EOL;
}
