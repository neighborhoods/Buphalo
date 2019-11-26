<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\BuilderInterface;

interface MapInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
{
    /** @param BuilderInterface ...$builders */
    public function __construct(array $builders = array(), int $flags = 0);

    public function offsetGet($index): BuilderInterface;

    /** @param BuilderInterface $builder */
    public function offsetSet($index, $builder);

    /** @param BuilderInterface $builder */
    public function append($builder);

    public function current(): BuilderInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    public function hydrate(array $array): MapInterface;
}
