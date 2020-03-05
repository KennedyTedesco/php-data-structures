<?php

declare(strict_types=1);

namespace Ds\Linear\Set;

final class Set
{
    /** @var bool[] $data */
    private array $data = [];

    public function has(int $element): bool
    {
        return isset($this->data[$element]);
    }

    public function add(int $element): void
    {
        $this->data[$element] = true;
    }

    public function delete(int $element): void
    {
        unset($this->data[$element]);
    }

    public function intersect(Set $set): Set
    {
        $intersectSet = new self();

        /** @var int $element */
        foreach ($this->data as $element => $value) {
            if ($set->has($element)) {
                $intersectSet->add($element);
            }
        }

        return $intersectSet;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function union(Set $set): Set
    {
        $unionSet = new self();

        /** @var int $element */
        foreach ($this->data as $element => $value) {
            $unionSet->add($element);
        }

        /** @var int $element */
        foreach ($set->data as $element => $value) {
            $unionSet->add($element);
        }

        return $unionSet;
    }
}
