<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car;

use ArrayIterator;
use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\CarInterface;

class Map extends ArrayIterator implements MapInterface
{
    /** @param CarInterface ...$Cars */
    public function __construct(array $Cars = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($Cars)) {
            $this->assertValidArrayType(...array_values($Cars));
        }

        parent::__construct($Cars, $flags);
    }

    public function offsetGet($index): CarInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param CarInterface $Car */
    public function offsetSet($index, $Car): void
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($Car));
    }

    /** @param CarInterface $Car */
    public function append($Car): void
    {
        $this->assertValidArrayItemType($Car);
        parent::append($Car);
    }

    public function current(): CarInterface
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(CarInterface $Car)
    {
        return $Car;
    }

    protected function assertValidArrayType(
        /** @noinspection PhpUnusedParameterInspection */
        CarInterface ...$Cars
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

    /** @param CarInterface ...$Cars */
    public function hydrate(array $Cars): MapInterface
    {
        $this->__construct($Cars);

        return $this;
    }
}
