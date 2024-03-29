<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Actor;

use ArrayIterator;
use LogicException;
use Neighborhoods\Buphalo\V2\FabricationFile\ActorInterface;

class Map extends ArrayIterator implements MapInterface
{
    /** @param ActorInterface ...$Actors */
    public function __construct(array $Actors = [], int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($Actors)) {
            $this->assertValidArrayType(...array_values($Actors));
        }

        parent::__construct($Actors, $flags);
    }

    public function offsetGet($index): ActorInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param ActorInterface $Actor */
    public function offsetSet($index, $Actor): void
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($Actor));
    }

    /** @param ActorInterface $Actor */
    public function append($Actor): void
    {
        $this->assertValidArrayItemType($Actor);
        parent::append($Actor);
    }

    public function current(): ActorInterface
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(ActorInterface $Actor)
    {
        return $Actor;
    }

    protected function assertValidArrayType(
        /** @noinspection PhpUnusedParameterInspection */
        ActorInterface ...$Actors
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

    /** @param ActorInterface ...$Actors */
    public function hydrate(array $Actors): MapInterface
    {
        $this->__construct($Actors);

        return $this;
    }
}
