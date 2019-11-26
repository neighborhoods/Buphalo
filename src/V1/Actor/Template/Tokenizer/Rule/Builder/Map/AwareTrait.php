<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\MapInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMap;

    public function setV1ActorTemplateTokenizerRuleBuilderMap(MapInterface $v1ActorTemplateTokenizerRuleBuilderMap
    ): self {
        if ($this->hasV1ActorTemplateTokenizerRuleBuilderMap()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMap is already set.');
        }
        $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMap = $v1ActorTemplateTokenizerRuleBuilderMap;

        return $this;
    }

    protected function getV1ActorTemplateTokenizerRuleBuilderMap(): MapInterface
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderMap()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMap is not set.');
        }

        return $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMap;
    }

    protected function hasV1ActorTemplateTokenizerRuleBuilderMap(): bool
    {
        return isset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMap);
    }

    protected function unsetV1ActorTemplateTokenizerRuleBuilderMap(): self
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderMap()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMap is not set.');
        }
        unset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMap);

        return $this;
    }
}
