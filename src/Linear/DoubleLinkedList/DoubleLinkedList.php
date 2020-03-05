<?php

declare(strict_types=1);

namespace Ds\Linear\DoubleLinkedList;

use Iterator;

final class DoubleLinkedList
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
            $newNode = new Node($property);
            $newNode->previousNode = $lastNode;

            $lastNode->nextNode = $newNode;
        }
    }

    public function addAfter(int $property, int $afterProperty): void
    {
        $afterNode = $this->searchNode($afterProperty);

        if ($afterNode instanceof Node) {
            $newNode = new Node($property);
            $newNode->previousNode = $afterNode;
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

    public function searchNodeBetween(int $firstProperty, int $secondProperty): ?Node
    {
        $node = $this->headNode;

        while ($node instanceof Node) {
            if ($node->previousNode === null || $node->nextNode === null) {
                continue;
            }

            if ($node->previousNode->property === $firstProperty && $node->nextNode->property === $secondProperty) {
                return $node;
            }

            $node = $node->nextNode;
        }

        return null;
    }

    public function lastNode(): ?Node
    {
        $node = $this->headNode;

        while ($node instanceof Node) {
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
