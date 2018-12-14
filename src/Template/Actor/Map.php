<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

class Map extends \ArrayIterator implements MapInterface
{
    /** @param ActorInterface ...$Strings */
    public function __construct(array $Strings = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new \LogicException('Map is not empty.');
        }

        if (!empty($Strings)) {
            $this->assertValidArrayType(...array_values($Strings));
        }

        parent::__construct($Strings, $flags);
    }

    public function offsetGet($index): ActorInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param ActorInterface $Actor */
    public function offsetSet($index, $Actor)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($Actor));
    }

    /** @param ActorInterface $Actor */
    public function append($Actor)
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

    protected function assertValidArrayType(ActorInterface ...$Actors): MapInterface
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

    /** @param ActorInterface ...$Actors */
    public function hydrate(array $Actors): MapInterface
    {
        $this->__construct($Actors);

        return $this;
    }
}
