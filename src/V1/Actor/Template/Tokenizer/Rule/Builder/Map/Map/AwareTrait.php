<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\Map;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\MapInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMap;

    public function setV1ActorTemplateTokenizerRuleBuilderMapMap(MapInterface $v1ActorTemplateTokenizerRuleBuilderMapMap
    ): self {
        if ($this->hasV1ActorTemplateTokenizerRuleBuilderMapMap()) {
            throw new LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMap is already set.');
        }
        $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMap = $v1ActorTemplateTokenizerRuleBuilderMapMap;

        return $this;
    }

    protected function getV1ActorTemplateTokenizerRuleBuilderMapMap(): MapInterface
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderMapMap()) {
            throw new LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMap is not set.');
        }

        return $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMap;
    }

    protected function hasV1ActorTemplateTokenizerRuleBuilderMapMap(): bool
    {
        return isset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMap);
    }

    protected function unsetV1ActorTemplateTokenizerRuleBuilderMapMap(): self
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderMapMap()) {
            throw new LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMap is not set.');
        }
        unset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMap);

        return $this;
    }
}
