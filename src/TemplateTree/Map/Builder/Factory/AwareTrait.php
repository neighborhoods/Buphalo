<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\TemplateTree\Map\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTemplateTreeMapBuilderFactory;

    public function setTemplateTreeMapBuilderFactory(FactoryInterface $templateTreeMapBuilderFactory): self
    {
        if ($this->hasTemplateTreeMapBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabTemplateTreeMapBuilderFactory = $templateTreeMapBuilderFactory;

        return $this;
    }

    protected function getTemplateTreeMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasTemplateTreeMapBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabTemplateTreeMapBuilderFactory;
    }

    protected function hasTemplateTreeMapBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabTemplateTreeMapBuilderFactory);
    }

    protected function unsetTemplateTreeMapBuilderFactory(): self
    {
        if (!$this->hasTemplateTreeMapBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabTemplateTreeMapBuilderFactory);

        return $this;
    }
}
