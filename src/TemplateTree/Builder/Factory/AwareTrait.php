<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\TemplateTree\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTemplateTreeBuilderFactory;

    public function setTemplateTreeBuilderFactory(FactoryInterface $templateTreeBuilderFactory): self
    {
        if ($this->hasTemplateTreeBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloTemplateTreeBuilderFactory = $templateTreeBuilderFactory;

        return $this;
    }

    protected function getTemplateTreeBuilderFactory(): FactoryInterface
    {
        if (!$this->hasTemplateTreeBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloTemplateTreeBuilderFactory;
    }

    protected function hasTemplateTreeBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloTemplateTreeBuilderFactory);
    }

    protected function unsetTemplateTreeBuilderFactory(): self
    {
        if (!$this->hasTemplateTreeBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloTemplateTreeBuilderFactory);

        return $this;
    }
}
