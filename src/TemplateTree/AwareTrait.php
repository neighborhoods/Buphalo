<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree;

use LogicException;
use Neighborhoods\Bradfab\TemplateTreeInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTemplateTree;

    public function setTemplateTree(TemplateTreeInterface $templateTree): self
    {
        if ($this->hasTemplateTree()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree is already set.');
        }
        $this->NeighborhoodsBradfabTemplateTree = $templateTree;

        return $this;
    }

    protected function getTemplateTree(): TemplateTreeInterface
    {
        if (!$this->hasTemplateTree()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree is not set.');
        }

        return $this->NeighborhoodsBradfabTemplateTree;
    }

    protected function hasTemplateTree(): bool
    {
        return isset($this->NeighborhoodsBradfabTemplateTree);
    }

    protected function unsetTemplateTree(): self
    {
        if (!$this->hasTemplateTree()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree is not set.');
        }
        unset($this->NeighborhoodsBradfabTemplateTree);

        return $this;
    }
}
