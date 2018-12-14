<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor;

use Rhift\Bradfab\FabricationFile\SupportingActorInterface;

class Map extends \ArrayIterator implements MapInterface
{
    /** @param SupportingActorInterface ...$SupportingActors */
    public function __construct(array $SupportingActors = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($SupportingActors)) {
            $this->assertValidArrayType(...array_values($SupportingActors));
        }

        parent::__construct($SupportingActors, $flags);
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

    /** @param SupportingActorInterface ...$SupportingActors */
    public function hydrate(array $SupportingActors): MapInterface
    {
        $this->__construct($SupportingActors);

        return $this;
    }
}
