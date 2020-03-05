<?php

declare(strict_types=1);

namespace Ds\Linear\DoubleLinkedList;

final class Node
{
    public int $property;
    public ?Node $nextNode = null;
    public ?Node $previousNode = null;

    public function __construct(
        int $property,
        ?Node $previousNode = null,
        ?Node $nextNode = null
    ) {
        $this->property = $property;
        $this->nextNode = $nextNode;
        $this->previousNode = $previousNode;
    }
}
