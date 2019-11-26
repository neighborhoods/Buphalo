<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Repository;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\RepositoryInterface;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;
use Neighborhoods\Buphalo\V1;

class Builder implements BuilderInterface
{
    use AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\Builder\Repository\Factory\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\Builder\Map\Factory\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\Builder\Map\Map\Factory\AwareTrait;

    private $RuleDefinitions;

    public function build(): RepositoryInterface
    {
        if ($this->hasV1ActorTemplateTokenizerRuleBuilderRepository()) {
            throw new LogicException('Repository builder build method was called twice.');
        }

        $repository = $this->getV1ActorTemplateTokenizerRuleBuilderRepositoryFactory()->create();
        $repository->setV1ActorTemplateTokenizerRuleBuilderMapFactory(
            $this->getV1ActorTemplateTokenizerRuleBuilderMapFactory()
        );
        $repository->setV1ActorTemplateTokenizerRuleBuilderMapMap(
            $this->getV1ActorTemplateTokenizerRuleBuilderMapMapFactory()->create()
        );
        $this->setV1ActorTemplateTokenizerRuleBuilderRepository($repository);

        foreach ($this->getRuleDefinitions() as $ruleDefinition) {
            $ruleBuilder = $this->extractRuleBuilder($ruleDefinition);
            $ruleBuilder->setRuleDefinition($ruleDefinition);
            $repository->add($this->extractFileExtension($ruleDefinition), $ruleBuilder);
        }

        return $repository;
    }

    private function extractFileExtension(array $ruleDefinition): string
    {
        return $ruleDefinition['file.extension'];
    }

    private function extractRuleBuilder(array $ruleDefinition): Rule\BuilderInterface
    {
        return $ruleDefinition['builder.factory']->create();
    }

    protected function getRuleDefinitions(): array
    {
        if ($this->RuleDefinitions === null) {
            throw new LogicException('Builder rule definitions has not been set.');
        }

        return $this->RuleDefinitions;
    }

    public function addRuleDefinition(array $ruleDefinition): BuilderInterface
    {
        $this->RuleDefinitions[] = $ruleDefinition;

        return $this;
    }
}
