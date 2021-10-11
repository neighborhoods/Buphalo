<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2;

use ArrayIterator;
use LogicException;

class BooleanMap extends ArrayIterator implements BooleanMapInterface
{
    /** @param bool ...$booleans */
    public function __construct(array $booleans = [], int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($booleans)) {
            $this->assertValidArrayType(...array_values($booleans));
        }

        parent::__construct($booleans, $flags);
    }

    public function offsetGet($index): bool
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    public function offsetSet($index, $boolean): void
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($boolean));
    }

    /** @param bool $boolean */
    public function append($boolean)
    {
        $this->assertValidArrayItemType($boolean);
        parent::append($boolean);
    }

    public function current(): bool
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(bool $int)
    {
        return $int;
    }

    protected function assertValidArrayType(
        /** @noinspection PhpUnusedParameterInspection */
        bool ...$booleans): BooleanMapInterface
    {
        return $this;
    }

    #[\ReturnTypeWillChange]
    public function getArrayCopy(): BooleanMapInterface
    {
        return new self(parent::getArrayCopy(), (int)$this->getFlags());
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    public function hydrate(array $booleans): BooleanMapInterface
    {
        $this->__construct($booleans);

        return $this;
    }
}
