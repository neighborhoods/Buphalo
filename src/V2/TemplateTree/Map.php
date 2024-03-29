<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree;

use ArrayIterator;
use LogicException;
use Neighborhoods\Buphalo\V2\TemplateTreeInterface;

/** @codeCoverageIgnore */
class Map extends ArrayIterator implements MapInterface
{
    /** @param TemplateTreeInterface ...$templateTrees */
    public function __construct(array $templateTrees = [], int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($templateTrees)) {
            $this->assertValidArrayType(...array_values($templateTrees));
        }

        parent::__construct($templateTrees, $flags);
    }

    public function offsetGet($index): TemplateTreeInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param TemplateTreeInterface $templateTree */
    public function offsetSet($index, $templateTree): void
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($templateTree));
    }

    /** @param TemplateTreeInterface $templateTree */
    public function append($templateTree): void
    {
        $this->assertValidArrayItemType($templateTree);
        parent::append($templateTree);
    }

    public function current(): TemplateTreeInterface
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(TemplateTreeInterface $templateTree)
    {
        return $templateTree;
    }

    protected function assertValidArrayType(
        /** @noinspection PhpUnusedParameterInspection */ TemplateTreeInterface ...$templateTrees
    ): MapInterface {
        return $this;
    }

    #[\ReturnTypeWillChange]
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
