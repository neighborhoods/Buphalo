<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor;

use ArrayIterator;
use LogicException;
use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;

class Map extends ArrayIterator implements MapInterface
{
    /** @param SupportingActorInterface ...$Actors */
    public function __construct(array $Actors = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($Actors)) {
            $this->assertValidArrayType(...array_values($Actors));
        }

        parent::__construct($Actors, $flags);
    }

    public function offsetGet($index): SupportingActorInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param SupportingActorInterface $Actor */
    public function offsetSet($index, $Actor)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($Actor));
    }

    /** @param SupportingActorInterface $Actor */
    public function append($Actor)
    {
        $this->assertValidArrayItemType($Actor);
        parent::append($Actor);
    }

    public function current(): SupportingActorInterface
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(SupportingActorInterface $Actor)
    {
        return $Actor;
    }

    protected function assertValidArrayType(
        /** @noinspection PhpUnusedParameterInspection */
        SupportingActorInterface ...$Actors
    ): MapInterface {
        return $this;
    }

    public function getArrayCopy(): MapInterface
    {
        return new self(parent::getArrayCopy(), (int)$this->getFlags());
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    /** @param SupportingActorInterface ...$Actors */
    public function hydrate(array $Actors): MapInterface
    {
        $this->__construct($Actors);

        return $this;
    }
}
