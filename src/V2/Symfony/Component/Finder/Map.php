<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Symfony\Component\Finder;

use ArrayIterator;
use LogicException;
use Symfony\Component\Finder\Finder;

/** @codeCoverageIgnore */
class Map extends ArrayIterator implements MapInterface
{
    /** @param Finder ...$finders */
    public function __construct(array $finders = [], int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($finders)) {
            $this->assertValidArrayType(...array_values($finders));
        }

        parent::__construct($finders, $flags);
    }

    public function offsetGet($index): Finder
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param Finder $finder */
    public function offsetSet($index, $finder): void
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($finder));
    }

    /** @param Finder $finder */
    public function append($finder): void
    {
        $this->assertValidArrayItemType($finder);
        parent::append($finder);
    }

    public function current(): Finder
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(Finder $finder)
    {
        return $finder;
    }

    protected function assertValidArrayType(
        /** @noinspection PhpUnusedParameterInspection */
        Finder ...$finders
    ): MapInterface {
        return $this;
    }

    #[\ReturnTypeWillChange]
    public function getArrayCopy(): MapInterface
    {
        return new self(parent::getArrayCopy(), (int)$this->getFlags());
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    public function hydrate(array $array): MapInterface
    {
        $this->__construct($array);

        return $this;
    }
}
