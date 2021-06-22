<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree\Map;

use LogicException;
use Neighborhoods\Buphalo\V2\TemplateTree\MapInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloTemplateTreeMap;

    public function setTemplateTreeMap(MapInterface $templateTreeMap): self
    {
        if ($this->hasTemplateTreeMap()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map is already set.');
        }
        $this->NeighborhoodsBuphaloTemplateTreeMap = $templateTreeMap;

        return $this;
    }

    protected function getTemplateTreeMap(): MapInterface
    {
        if (!$this->hasTemplateTreeMap()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map is not set.');
        }

        return $this->NeighborhoodsBuphaloTemplateTreeMap;
    }

    protected function hasTemplateTreeMap(): bool
    {
        return isset($this->NeighborhoodsBuphaloTemplateTreeMap);
    }

    protected function unsetTemplateTreeMap(): self
    {
        if (!$this->hasTemplateTreeMap()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map is not set.');
        }
        unset($this->NeighborhoodsBuphaloTemplateTreeMap);

        return $this;
    }
}
