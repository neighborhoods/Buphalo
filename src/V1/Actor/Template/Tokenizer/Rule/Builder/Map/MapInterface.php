<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map;

use ArrayAccess;
use Countable;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param Builder\MapInterface ...$maps */
    public function __construct(array $maps = array(), int $flags = 0);

    public function offsetGet($index): Builder\MapInterface;

    /** @param Builder\MapInterface $map */
    public function offsetSet($index, $map);

    /** @param Builder\MapInterface $map */
    public function append($map);

    public function current(): Builder\MapInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    public function hydrate(array $array): MapInterface;
}
