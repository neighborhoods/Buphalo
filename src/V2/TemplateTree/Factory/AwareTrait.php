<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree\Factory;

use LogicException;
use Neighborhoods\Buphalo\V2\TemplateTree\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTemplateTreeFactory;

    public function setTemplateTreeFactory(FactoryInterface $templateTreeFactory): self
    {
        if ($this->hasTemplateTreeFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Factory is already set.');
        }
        $this->NeighborhoodsBuphaloTemplateTreeFactory = $templateTreeFactory;

        return $this;
    }

    protected function getTemplateTreeFactory(): FactoryInterface
    {
        if (!$this->hasTemplateTreeFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloTemplateTreeFactory;
    }

    protected function hasTemplateTreeFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloTemplateTreeFactory);
    }

    protected function unsetTemplateTreeFactory(): self
    {
        if (!$this->hasTemplateTreeFactory()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloTemplateTreeFactory);

        return $this;
    }
}
