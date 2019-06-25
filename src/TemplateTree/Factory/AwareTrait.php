<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Factory;

use LogicException;
use Neighborhoods\Bradfab\TemplateTree\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTemplateTreeFactory;

    public function setTemplateTreeFactory(FactoryInterface $templateTreeFactory): self
    {
        if ($this->hasTemplateTreeFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Factory is already set.');
        }
        $this->NeighborhoodsBradfabTemplateTreeFactory = $templateTreeFactory;

        return $this;
    }

    protected function getTemplateTreeFactory(): FactoryInterface
    {
        if (!$this->hasTemplateTreeFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Factory is not set.');
        }

        return $this->NeighborhoodsBradfabTemplateTreeFactory;
    }

    protected function hasTemplateTreeFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabTemplateTreeFactory);
    }

    protected function unsetTemplateTreeFactory(): self
    {
        if (!$this->hasTemplateTreeFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabTemplateTreeFactory);

        return $this;
    }
}
