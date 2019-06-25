<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Builder;

use LogicException;
use Neighborhoods\Bradfab\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTemplateTreeBuilder;

    public function setTemplateTreeBuilder(BuilderInterface $templateTreeBuilder): self
    {
        if ($this->hasTemplateTreeBuilder()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Builder is already set.');
        }
        $this->NeighborhoodsBradfabTemplateTreeBuilder = $templateTreeBuilder;

        return $this;
    }

    protected function getTemplateTreeBuilder(): BuilderInterface
    {
        if (!$this->hasTemplateTreeBuilder()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Builder is not set.');
        }

        return $this->NeighborhoodsBradfabTemplateTreeBuilder;
    }

    protected function hasTemplateTreeBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabTemplateTreeBuilder);
    }

    protected function unsetTemplateTreeBuilder(): self
    {
        if (!$this->hasTemplateTreeBuilder()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabTemplateTreeBuilder);

        return $this;
    }
}
