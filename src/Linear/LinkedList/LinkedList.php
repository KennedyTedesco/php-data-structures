<?php

declare(strict_types=1);

namespace Ds\Linear\LinkedList;

use Iterator;

final class LinkedList
{
    public ?Node $headNode = null;

    public function addToHead(int $property): void
    {
        $node = new Node($property);
        $node->nextNode = $this->headNode;

        $this->headNode = $node;
    }

    public function addToEnd(int $property): void
    {
        $lastNode = $this->lastNode();

        if ($lastNode instanceof Node) {
            $lastNode->nextNode = new Node($property);
        }
    }

    public function addAfter(int $property, int $afterProperty): void
    {
        $newNode = new Node($property);
        $afterNode = $this->searchNode($afterProperty);

        if ($afterNode instanceof Node) {
            $newNode->nextNode = $afterNode->nextNode;

            $afterNode->nextNode = $newNode;
        }
    }

    public function searchNode(int $property): ?Node
    {
        $node = $this->headNode;

        while ($node instanceof Node) {
            if ($node->property === $property) {
                return $node;
            }

            $node = $node->nextNode;
        }

        return null;
    }

    public function lastNode(): ?Node
    {
        $node = $this->headNode;

        while ($node !== null) {
            if ($node->nextNode === null) {
                return $node;
            }

            $node = $node->nextNode;
        }

        return null;
    }

    public function iterate(): Iterator
    {
        $node = $this->headNode;

        while ($node instanceof Node) {
            yield $node;

            $node = $node->nextNode;
        }
    }
}
