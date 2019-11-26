<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace;

use InvalidArgumentException;
use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplaceInterface;
use Neighborhoods\Buphalo\V1;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use V1\Actor\Template\Tokenizer\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\Context\Builder\Factory\AwareTrait;
    use V1\Actor\AwareTrait;
    use V1\Actor\Template\AwareTrait;

    private $RuleDefinition;
    private $TemplateContents;

    public function build(): StrReplaceInterface
    {
        $StrReplace = $this->getV1ActorTemplateTokenizerRuleStrReplaceFactory()->create();
        $StrReplace->setSearch($this->getRuleDefinition()[BuilderInterface::DEFINITION_KEY_SEARCH]);
        $StrReplace->setReplace($this->getRuleDefinition()[BuilderInterface::DEFINITION_KEY_REPLACE]);
        $StrReplace->setTemplateContents($this->getTemplateContents());
        $ruleContextBuilder = $this->getV1ActorTemplateTokenizerRuleContextBuilderFactory()->create();
        $ruleContextBuilder->setActorTemplate($this->getActorTemplate());
        $ruleContextBuilder->setActor($this->getActor());
        $StrReplace->setV1ActorTemplateTokenizerRuleContext($ruleContextBuilder->build());

        return $StrReplace;
    }

    private function getRuleDefinition(): array
    {
        if ($this->RuleDefinition === null) {
            throw new LogicException('Builder rule definition has not been set.');
        }

        return $this->RuleDefinition;
    }

    public function setRuleDefinition(array $ruleDefinition): BuilderInterface
    {
        if (!array_key_exists(BuilderInterface::DEFINITION_KEY_SEARCH, $ruleDefinition)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Rule definition does not contain a "%s" field.',
                    BuilderInterface::DEFINITION_KEY_SEARCH
                )
            );
        }
        if (!array_key_exists(BuilderInterface::DEFINITION_KEY_REPLACE, $ruleDefinition)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Rule definition does not contain a "%s" field.',
                    BuilderInterface::DEFINITION_KEY_REPLACE
                )
            );
        }

        $this->RuleDefinition = $ruleDefinition;

        return $this;
    }

    private function getTemplateContents(): string
    {
        if ($this->TemplateContents === null) {
            throw new LogicException('Template Contents has not been set.');
        }

        return $this->TemplateContents;
    }

    public function setTemplateContents(string $TemplateContents): BuilderInterface
    {
        if ($this->TemplateContents !== null) {
            throw new LogicException('Template Contents is already set.');
        }

        $this->TemplateContents = $TemplateContents;

        return $this;
    }
}
