<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Ds\Linear\DoubleLinkedList\DoubleLinkedList;
use Ds\Linear\DoubleLinkedList\Node;

$list = new DoubleLinkedList();
$list->addToHead(10);
$list->addToHead(9);
$list->addToHead(8);
$list->addToHead(7);

$list->addToEnd(2);
$list->addToEnd(1);
$list->addToHead(11);

$list->addAfter(3, 2);

/** @var Node $node */
foreach ($list->iterate() as $node) {
    echo $node->property . \PHP_EOL;
}
