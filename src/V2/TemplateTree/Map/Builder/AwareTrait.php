<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree\Map\Builder;

use LogicException;
use Neighborhoods\Buphalo\V2\TemplateTree\Map\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTemplateTreeMapBuilder;

    public function setTemplateTreeMapBuilder(BuilderInterface $templateTreeMapBuilder): self
    {
        if ($this->hasTemplateTreeMapBuilder()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Builder is already set.');
        }
        $this->NeighborhoodsBuphaloTemplateTreeMapBuilder = $templateTreeMapBuilder;

        return $this;
    }

    protected function getTemplateTreeMapBuilder(): BuilderInterface
    {
        if (!$this->hasTemplateTreeMapBuilder()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloTemplateTreeMapBuilder;
    }

    protected function hasTemplateTreeMapBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloTemplateTreeMapBuilder);
    }

    protected function unsetTemplateTreeMapBuilder(): self
    {
        if (!$this->hasTemplateTreeMapBuilder()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloTemplateTreeMapBuilder);

        return $this;
    }
}
