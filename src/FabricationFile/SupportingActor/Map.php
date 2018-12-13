<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor;

use Rhift\Bradfab\FabricationFile\SupportingActorInterface;

class Map extends \ArrayIterator implements MapInterface
{
    /** @param SupportingActorInterface ...$SupportingString */
    public function __construct(array $SupportingString = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($SupportingString)) {
            $this->assertValidArrayType(...array_values($SupportingString));
        }

        parent::__construct($SupportingString, $flags);
    }

    public function offsetGet($index): SupportingActorInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param SupportingActorInterface $SupportingActor */
    public function offsetSet($index, $SupportingActor)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($SupportingActor));
    }

    /** @param SupportingActorInterface $SupportingActor */
    public function append($SupportingActor)
    {
        $this->assertValidArrayItemType($SupportingActor);
        parent::append($SupportingActor);
    }

    public function current(): SupportingActorInterface
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(SupportingActorInterface $SupportingActor)
    {
        return $SupportingActor;
    }

    protected function assertValidArrayType(SupportingActorInterface ...$SupportingActors): MapInterface
    {
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

    public function hydrate(array $array): MapInterface
    {
        $this->__construct($array);

        return $this;
    }
}
