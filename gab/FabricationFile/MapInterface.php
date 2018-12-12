<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\FabricationFileInterface;

interface MapInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
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

    public function hydrate(array $array): MapInterface;
}
