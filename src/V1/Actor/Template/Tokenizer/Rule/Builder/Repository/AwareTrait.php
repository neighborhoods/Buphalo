<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Repository;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\RepositoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepository;

    public function setV1ActorTemplateTokenizerRuleBuilderRepository(
        RepositoryInterface $v1ActorTemplateTokenizerRuleBuilderRepository
    ): self {
        if ($this->hasV1ActorTemplateTokenizerRuleBuilderRepository()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepository is already set.');
        }
        $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepository = $v1ActorTemplateTokenizerRuleBuilderRepository;

        return $this;
    }

    protected function getV1ActorTemplateTokenizerRuleBuilderRepository(): RepositoryInterface
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderRepository()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepository is not set.');
        }

        return $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepository;
    }

    protected function hasV1ActorTemplateTokenizerRuleBuilderRepository(): bool
    {
        return isset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepository);
    }

    protected function unsetV1ActorTemplateTokenizerRuleBuilderRepository(): self
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleBuilderRepository()) {
            throw new \LogicException('NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepository is not set.');
        }
        unset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleBuilderRepository);

        return $this;
    }
}
