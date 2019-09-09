<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map;

use LogicException;
use Neighborhoods\Bradfab\TemplateTree\MapInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabTemplateTreeMap;

    public function setTemplateTreeMap(MapInterface $templateTreeMap): self
    {
        if ($this->hasTemplateTreeMap()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map is already set.');
        }
        $this->NeighborhoodsBradfabTemplateTreeMap = $templateTreeMap;

        return $this;
    }

    protected function getTemplateTreeMap(): MapInterface
    {
        if (!$this->hasTemplateTreeMap()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map is not set.');
        }

        return $this->NeighborhoodsBradfabTemplateTreeMap;
    }

    protected function hasTemplateTreeMap(): bool
    {
        return isset($this->NeighborhoodsBradfabTemplateTreeMap);
    }

    protected function unsetTemplateTreeMap(): self
    {
        if (!$this->hasTemplateTreeMap()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map is not set.');
        }
        unset($this->NeighborhoodsBradfabTemplateTreeMap);

        return $this;
    }
}
