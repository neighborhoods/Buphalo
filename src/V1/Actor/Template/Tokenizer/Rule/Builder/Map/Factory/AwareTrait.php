<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\Factory;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapFactory;

    public function setV1ActorTemplateTokenizerRuleBuilderMapFactory(
        FactoryInterface $v1ActorTemplateTokenizerRuleBuilderMapFactory
    ): self {
        if ($this->hasV1ActorTemplateTokenizerRuleBuilderMapFactory()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapFactory is already set.');
        }
        $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapFactory = $v1ActorTemplateTokenizerRuleBuilderMapFactory;

        return $this;
    }

    protected function getV1ActorTemplateTokenizerRuleBuilderMapFactory(): FactoryInterface
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderMapFactory()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapFactory is not set.');
        }

        return $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapFactory;
    }

    protected function hasV1ActorTemplateTokenizerRuleBuilderMapFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapFactory);
    }

    protected function unsetV1ActorTemplateTokenizerRuleBuilderMapFactory(): self
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderMapFactory()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapFactory is not set.');
        }
        unset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderMapFactory);

        return $this;
    }
}
