<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree\Map\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\TemplateTree\Map\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTemplateTreeMapBuilderFactory;

    public function setTemplateTreeMapBuilderFactory(FactoryInterface $templateTreeMapBuilderFactory): self
    {
        if ($this->hasTemplateTreeMapBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloTemplateTreeMapBuilderFactory = $templateTreeMapBuilderFactory;

        return $this;
    }

    protected function getTemplateTreeMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasTemplateTreeMapBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloTemplateTreeMapBuilderFactory;
    }

    protected function hasTemplateTreeMapBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloTemplateTreeMapBuilderFactory);
    }

    protected function unsetTemplateTreeMapBuilderFactory(): self
    {
        if (!$this->hasTemplateTreeMapBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloTemplateTreeMapBuilderFactory);

        return $this;
    }
}
