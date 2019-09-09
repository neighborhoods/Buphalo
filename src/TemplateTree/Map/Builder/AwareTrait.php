<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map\Builder;

use LogicException;
use Neighborhoods\Bradfab\TemplateTree\Map\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTemplateTreeMapBuilder;

    public function setTemplateTreeMapBuilder(BuilderInterface $templateTreeMapBuilder): self
    {
        if ($this->hasTemplateTreeMapBuilder()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Builder is already set.');
        }
        $this->NeighborhoodsBradfabTemplateTreeMapBuilder = $templateTreeMapBuilder;

        return $this;
    }

    protected function getTemplateTreeMapBuilder(): BuilderInterface
    {
        if (!$this->hasTemplateTreeMapBuilder()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Builder is not set.');
        }

        return $this->NeighborhoodsBradfabTemplateTreeMapBuilder;
    }

    protected function hasTemplateTreeMapBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabTemplateTreeMapBuilder);
    }

    protected function unsetTemplateTreeMapBuilder(): self
    {
        if (!$this->hasTemplateTreeMapBuilder()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabTemplateTreeMapBuilder);

        return $this;
    }
}
