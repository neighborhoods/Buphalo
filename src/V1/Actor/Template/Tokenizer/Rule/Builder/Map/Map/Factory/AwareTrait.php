<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\Map\Factory;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\Map\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMapFactory;

    public function setV1ActorTemplateTokenizerRuleBuilderMapMapFactory(
        FactoryInterface $v1ActorTemplateTokenizerRuleBuilderMapMapFactory
    ): self {
        if ($this->hasV1ActorTemplateTokenizerRuleBuilderMapMapFactory()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMapFactory is already set.');
        }
        $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMapFactory = $v1ActorTemplateTokenizerRuleBuilderMapMapFactory;

        return $this;
    }

    protected function getV1ActorTemplateTokenizerRuleBuilderMapMapFactory(): FactoryInterface
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderMapMapFactory()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMapFactory is not set.');
        }

        return $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMapFactory;
    }

    protected function hasV1ActorTemplateTokenizerRuleBuilderMapMapFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMapFactory);
    }

    protected function unsetV1ActorTemplateTokenizerRuleBuilderMapMapFactory(): self
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderMapMapFactory()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMapFactory is not set.');
        }
        unset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapMapFactory);

        return $this;
    }
}
