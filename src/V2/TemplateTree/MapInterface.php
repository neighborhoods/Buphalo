<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree;

use ArrayAccess;
use Countable;
use Neighborhoods\Buphalo\V2\TemplateTreeInterface;
use SeekableIterator;
use Serializable;

/** @codeCoverageIgnore */
interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param TemplateTreeInterface ...$templateTrees */
    public function __construct(array $templateTrees = [], int $flags = 0);

    public function offsetGet($index): TemplateTreeInterface;

    /** @param TemplateTreeInterface $templateTree */
    public function offsetSet($index, $templateTree): void;

    /** @param TemplateTreeInterface $templateTree */
    public function append($templateTree): void;

    public function current(): TemplateTreeInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    public function hydrate(array $array): MapInterface;
}
