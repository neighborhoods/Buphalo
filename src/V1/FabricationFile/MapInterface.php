<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile;

use ArrayAccess;
use Countable;
use Neighborhoods\Buphalo\V1\FabricationFileInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param FabricationFileInterface ...$FabricationFiles */
    public function __construct(array $FabricationFiles = array(), int $flags = 0);

    public function offsetGet($index): FabricationFileInterface;

    /** @param FabricationFileInterface $FabricationFile */
    public function offsetSet($index, $FabricationFile);

    /** @param FabricationFileInterface $FabricationFile */
    public function append($FabricationFile);

    public function current(): FabricationFileInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    /** @param FabricationFileInterface ...$FabricationFiles */
    public function hydrate(array $FabricationFiles): MapInterface;
}
