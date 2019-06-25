<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\TemplateTree\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTemplateTreeBuilderFactory;

    public function setTemplateTreeBuilderFactory(FactoryInterface $templateTreeBuilderFactory): self
    {
        if ($this->hasTemplateTreeBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabTemplateTreeBuilderFactory = $templateTreeBuilderFactory;

        return $this;
    }

    protected function getTemplateTreeBuilderFactory(): FactoryInterface
    {
        if (!$this->hasTemplateTreeBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabTemplateTreeBuilderFactory;
    }

    protected function hasTemplateTreeBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabTemplateTreeBuilderFactory);
    }

    protected function unsetTemplateTreeBuilderFactory(): self
    {
        if (!$this->hasTemplateTreeBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabTemplateTreeBuilderFactory);

        return $this;
    }
}
