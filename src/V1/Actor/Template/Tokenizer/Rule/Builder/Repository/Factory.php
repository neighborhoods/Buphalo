<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Repository;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\RepositoryInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;
    private $V1ActorTemplateTokenizerRuleBuilderRepositoryFQCN;

    public function create(): RepositoryInterface
    {
        if ($this->hasV1ActorTemplateTokenizerRuleBuilderRepository()) {
            throw new LogicException('The repository factory create method was called twice.');
        }

        $repositoryFQCN = $this->getV1ActorTemplateTokenizerRuleBuilderRepositoryFQCN();
        $this->setV1ActorTemplateTokenizerRuleBuilderRepository(new $repositoryFQCN);

        return $this->getV1ActorTemplateTokenizerRuleBuilderRepository();
    }

    private function getV1ActorTemplateTokenizerRuleBuilderRepositoryFQCN()
    {
        if ($this->V1ActorTemplateTokenizerRuleBuilderRepositoryFQCN === null) {
            throw new LogicException('V1 Actor Template Tokenizer Rule Repository FQCN has not been set.');
        }

        return $this->V1ActorTemplateTokenizerRuleBuilderRepositoryFQCN;
    }

    public function setV1ActorTemplateTokenizerRuleBuilderRepositoryFQCN($V1ActorTemplateTokenizerRuleBuilderRepositoryFQCN
    ): FactoryInterface {
        if ($this->V1ActorTemplateTokenizerRuleBuilderRepositoryFQCN !== null) {
            throw new LogicException('V1 Actor Template Tokenizer Rule Repository FQCN is already set.');
        }

        $this->V1ActorTemplateTokenizerRuleBuilderRepositoryFQCN = $V1ActorTemplateTokenizerRuleBuilderRepositoryFQCN;

        return $this;
    }

}
