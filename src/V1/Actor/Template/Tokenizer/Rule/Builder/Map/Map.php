<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map;

use ArrayIterator;
use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder;

class Map extends ArrayIterator implements MapInterface
{
    /** @param Builder\MapInterface ...$maps */
    public function __construct(array $maps = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($maps)) {
            $this->assertValidArrayType(...array_values($maps));
        }

        parent::__construct($maps, $flags);
    }

    public function offsetGet($index): Builder\MapInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param Builder\MapInterface $map */
    public function offsetSet($index, $map)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($map));
    }

    /** @param Builder\MapInterface $map */
    public function append($map)
    {
        $this->assertValidArrayItemType($map);
        parent::append($map);
    }

    public function current(): Builder\MapInterface
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(Builder\MapInterface $map)
    {
        return $map;
    }

    protected function assertValidArrayType(Builder\MapInterface ...$maps): MapInterface
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
