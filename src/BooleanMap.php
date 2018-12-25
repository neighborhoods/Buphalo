<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class BooleanMap extends \ArrayIterator implements BooleanMapInterface
{
    /** @param bool ...$booleans */
    public function __construct(array $booleans = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
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

    /** @param bool $boolesn */
    public function offsetSet($index, $integer)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($integer));
    }

    /** @param bool $integer */
    public function append($integer)
    {
        $this->assertValidArrayItemType($integer);
        parent::append($integer);
    }

    public function current(): bool
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(bool $int)
    {
        return $int;
    }

    protected function assertValidArrayType(bool ...$booleans): BooleanMapInterface
    {
        return $this;
    }

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
