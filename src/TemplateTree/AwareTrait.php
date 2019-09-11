<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree;

use LogicException;
use Neighborhoods\Buphalo\TemplateTreeInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTemplateTree;

    public function setTemplateTree(TemplateTreeInterface $templateTree): self
    {
        if ($this->hasTemplateTree()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree is already set.');
        }
        $this->NeighborhoodsBuphaloTemplateTree = $templateTree;

        return $this;
    }

    protected function getTemplateTree(): TemplateTreeInterface
    {
        if (!$this->hasTemplateTree()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree is not set.');
        }

        return $this->NeighborhoodsBuphaloTemplateTree;
    }

    protected function hasTemplateTree(): bool
    {
        return isset($this->NeighborhoodsBuphaloTemplateTree);
    }

    protected function unsetTemplateTree(): self
    {
        if (!$this->hasTemplateTree()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree is not set.');
        }
        unset($this->NeighborhoodsBuphaloTemplateTree);

        return $this;
    }
}
