<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

/** @codeCoverageIgnore */
class Map extends \ArrayIterator implements MapInterface
{
    /** @param ActorInterface ...$actors */
    public function __construct(array $actors = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($actors)) {
            $this->assertValidArrayType(...array_values($actors));
        }

        parent::__construct($actors, $flags);
    }

    public function offsetGet($index): ActorInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param ActorInterface $actor */
    public function offsetSet($index, $actor)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($actor));
    }

    /** @param ActorInterface $actor */
    public function append($actor)
    {
        $this->assertValidArrayItemType($actor);
        parent::append($actor);
    }

    public function current(): ActorInterface
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(ActorInterface $actor)
    {
        return $actor;
    }

    protected function assertValidArrayType(ActorInterface ...$actors): MapInterface
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
