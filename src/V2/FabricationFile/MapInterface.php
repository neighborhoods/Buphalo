<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile;

use ArrayAccess;
use Countable;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param FabricationFileInterface ...$FabricationFiles */
    public function __construct(array $FabricationFiles = [], int $flags = 0);

    public function offsetGet($index): FabricationFileInterface;

    /** @param FabricationFileInterface $FabricationFile */
    public function offsetSet($index, $FabricationFile): void;

    /** @param FabricationFileInterface $FabricationFile */
    public function append($FabricationFile): void;

    public function current(): FabricationFileInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    /** @param FabricationFileInterface ...$FabricationFiles */
    public function hydrate(array $FabricationFiles): MapInterface;
}
