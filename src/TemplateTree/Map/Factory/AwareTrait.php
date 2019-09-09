<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map\Factory;

use LogicException;
use Neighborhoods\Bradfab\TemplateTree\Map\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTemplateTreeMapFactory;

    public function setTemplateTreeMapFactory(FactoryInterface $templateTreeMapFactory): self
    {
        if ($this->hasTemplateTreeMapFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Factory is already set.');
        }
        $this->NeighborhoodsBradfabTemplateTreeMapFactory = $templateTreeMapFactory;

        return $this;
    }

    protected function getTemplateTreeMapFactory(): FactoryInterface
    {
        if (!$this->hasTemplateTreeMapFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Factory is not set.');
        }

        return $this->NeighborhoodsBradfabTemplateTreeMapFactory;
    }

    protected function hasTemplateTreeMapFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabTemplateTreeMapFactory);
    }

    protected function unsetTemplateTreeMapFactory(): self
    {
        if (!$this->hasTemplateTreeMapFactory()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabTemplateTreeMapFactory);

        return $this;
    }
}
