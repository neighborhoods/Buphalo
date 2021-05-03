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

    private $Options;

    public function build(): RepositoryInterface
    {
        $this->assertRepositoryIsNotBuilt();
        $repository = $this->getV1ActorTemplateTokenizerRuleBuilderRepositoryFactory()->create();
        $repository->setV1ActorTemplateTokenizerRuleBuilderMapFactory(
            $this->getV1ActorTemplateTokenizerRuleBuilderMapFactory()
        );
        $repository->setV1ActorTemplateTokenizerRuleBuilderMapMap(
            $this->getV1ActorTemplateTokenizerRuleBuilderMapMapFactory()->create()
        );

        $this->setV1ActorTemplateTokenizerRuleBuilderRepository($repository);

        foreach ($this->getRuleOptions() as $options) {
            $ruleBuilder = $this->extractRuleBuilder($options);
            $ruleBuilder->setOptions($options);
            $repository->add($ruleBuilder);
        }

        return $repository;
    }

    private function extractRuleBuilder(array $options): Rule\BuilderInterface
    {
        return $options[BuilderInterface::OPTION_BUILDER_FACTORY_SERVICE]->create();
    }

    protected function getRuleOptions(): array
    {
        if ($this->Options === null) {
            throw new LogicException('Builder options has not been set.');
        }

        return $this->Options;
    }

    public function addOptions(array $options): BuilderInterface
    {
        $this->assertRepositoryIsNotBuilt();
        $this->Options[] = $options;

        return $this;
    }

    private function assertRepositoryIsNotBuilt(): BuilderInterface
    {
        if ($this->hasV1ActorTemplateTokenizerRuleBuilderRepository()) {
            throw new LogicException('Repository is already built.');
        }

        return $this;
    }
}
