<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Map\Factory;

use LogicException;
use Neighborhoods\Buphalo\TemplateTree\Map\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTemplateTreeMapFactory;

    public function setTemplateTreeMapFactory(FactoryInterface $templateTreeMapFactory): self
    {
        if ($this->hasTemplateTreeMapFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Factory is already set.');
        }
        $this->NeighborhoodsBuphaloTemplateTreeMapFactory = $templateTreeMapFactory;

        return $this;
    }

    protected function getTemplateTreeMapFactory(): FactoryInterface
    {
        if (!$this->hasTemplateTreeMapFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloTemplateTreeMapFactory;
    }

    protected function hasTemplateTreeMapFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloTemplateTreeMapFactory);
    }

    protected function unsetTemplateTreeMapFactory(): self
    {
        if (!$this->hasTemplateTreeMapFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloTemplateTreeMapFactory);

        return $this;
    }
}
