<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Repository\Factory;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Repository\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepositoryFactory;

    public function setV1ActorTemplateTokenizerRuleBuilderRepositoryFactory(
        FactoryInterface $v1ActorTemplateTokenizerRuleBuilderRepositoryFactory
    ): self {
        if ($this->hasV1ActorTemplateTokenizerRuleBuilderRepositoryFactory()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepositoryFactory is already set.');
        }
        $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepositoryFactory = $v1ActorTemplateTokenizerRuleBuilderRepositoryFactory;

        return $this;
    }

    protected function getV1ActorTemplateTokenizerRuleBuilderRepositoryFactory(): FactoryInterface
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderRepositoryFactory()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepositoryFactory is not set.');
        }

        return $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepositoryFactory;
    }

    protected function hasV1ActorTemplateTokenizerRuleBuilderRepositoryFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepositoryFactory);
    }

    protected function unsetV1ActorTemplateTokenizerRuleBuilderRepositoryFactory(): self
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderRepositoryFactory()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepositoryFactory is not set.');
        }
        unset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepositoryFactory);

        return $this;
    }
}
