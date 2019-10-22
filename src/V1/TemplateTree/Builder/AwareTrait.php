<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree\Builder;

use LogicException;
use Neighborhoods\Buphalo\V1\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTemplateTreeBuilder;

    public function setTemplateTreeBuilder(BuilderInterface $templateTreeBuilder): self
    {
        if ($this->hasTemplateTreeBuilder()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Builder is already set.');
        }
        $this->NeighborhoodsBuphaloTemplateTreeBuilder = $templateTreeBuilder;

        return $this;
    }

    protected function getTemplateTreeBuilder(): BuilderInterface
    {
        if (!$this->hasTemplateTreeBuilder()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloTemplateTreeBuilder;
    }

    protected function hasTemplateTreeBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloTemplateTreeBuilder);
    }

    protected function unsetTemplateTreeBuilder(): self
    {
        if (!$this->hasTemplateTreeBuilder()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloTemplateTreeBuilder);

        return $this;
    }
}
