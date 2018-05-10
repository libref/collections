<?php

declare(strict_types=1);

namespace LibRef\Collections;

use Iterator;
use LibCon\Core\Properties\Immutable;
use LibCon\Collections\Collection as CollectionContract;

class Collection implements Iterator, CollectionContract, Immutable
{
    /** @var array */
    private $items = [];

    /**
     * Create new collection of any number of values.
     *
     * @param mixed ...$values
     */
    public function __construct(...$values)
    {
        $this->items = $values;
    }

    /**
     * Returns `true` if there are no items in the collection, `false` otherwise.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return count($this->items) === 0;
    }

    /**
     * Returns the number of items in the collection.
     *
     * @internal
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Returns the current item of the collection.
     *
     * @internal
     * @return mixed
     */
    public function current()
    {
        return current($this->items);
    }

    /**
     * Returns the next item of the collection.
     *
     * @internal
     * @return mixed
     */
    public function next()
    {
        return next($this->items);
    }

    /**
     * Returns the key of the current item of the collection.
     *
     * @internal
     * @return int|null
     */
    public function key(): ?int
    {
        return key($this->items);
    }

    /**
     * Returns `true` if an item is available for iteration,`false` otherwise.
     *
     * @internal
     * @return bool
     */
    public function valid()
    {
        return $this->key() !== null;
    }

    /**
     * Resets current to the start of the collection.
     *
     * @internal
     */
    public function rewind(): void
    {
        reset($this->items);
    }
}
