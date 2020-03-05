<?php

declare(strict_types=1);

namespace Ds\Linear\LinkedList;

final class Node
{
    public int $property;
    public ?Node $nextNode = null;

    public function __construct(
        int $property,
        ?Node $nextNode = null
    ) {
        $this->property = $property;
        $this->nextNode = $nextNode;
    }
}
