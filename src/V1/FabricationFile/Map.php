<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile;

use ArrayIterator;
use LogicException;
use Neighborhoods\Buphalo\V1\FabricationFileInterface;

class Map extends ArrayIterator implements MapInterface
{
    /** @param FabricationFileInterface ...$FabricationFiles */
    public function __construct(array $FabricationFiles = [], int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($FabricationFiles)) {
            $this->assertValidArrayType(...array_values($FabricationFiles));
        }

        parent::__construct($FabricationFiles, $flags);
    }

    public function offsetGet($index): FabricationFileInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param FabricationFileInterface $FabricationFile */
    public function offsetSet($index, $FabricationFile)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($FabricationFile));
    }

    /** @param FabricationFileInterface $FabricationFile */
    public function append($FabricationFile)
    {
        $this->assertValidArrayItemType($FabricationFile);
        parent::append($FabricationFile);
    }

    public function current(): FabricationFileInterface
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(FabricationFileInterface $FabricationFile)
    {
        return $FabricationFile;
    }

    protected function assertValidArrayType(
        /** @noinspection PhpUnusedParameterInspection */
        FabricationFileInterface ...$FabricationFiles
    ): MapInterface {
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

    /** @param FabricationFileInterface ...$FabricationFiles */
    public function hydrate(array $FabricationFiles): MapInterface
    {
        $this->__construct($FabricationFiles);

        return $this;
    }
}
