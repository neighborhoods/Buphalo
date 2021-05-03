<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace;

use LogicException;
use Neighborhoods\Buphalo\V1;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use V1\Actor\Template\Tokenizer\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\Context\Builder\Factory\AwareTrait;
    use V1\Actor\AwareTrait;
    use V1\Actor\Template\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\StrReplace\Builder\OptionsResolverDecorator\AwareTrait;

    private $Options;
    private $TemplateContents;

    public function build(): V1\Actor\Template\Tokenizer\RuleInterface
    {
        $StrReplace = $this->getV1ActorTemplateTokenizerRuleStrReplaceFactory()->create();
        $StrReplace->setSearch($this->getOptions()[BuilderInterface::OPTION_SEARCH]);
        $StrReplace->setReplace($this->getOptions()[BuilderInterface::OPTION_REPLACE]);
        $StrReplace->setFileExtensionAffinity(
            $this->getOptions()[V1\Actor\Template\Tokenizer\Rule\BuilderInterface::OPTION_FILE_EXTENSION_AFFINITY]
        );
        $StrReplace->setTemplateContents($this->getTemplateContents());
        $ruleContextBuilder = $this->getV1ActorTemplateTokenizerRuleContextBuilderFactory()->create();
        $ruleContextBuilder->setActorTemplate($this->getActorTemplate());
        $ruleContextBuilder->setActor($this->getActor());
        $StrReplace->setV1ActorTemplateTokenizerRuleContext($ruleContextBuilder->build());

        return $StrReplace;
    }

    public function getOptions(): array
    {
        if ($this->Options === null) {
            throw new LogicException('Builder options has not been set.');
        }

        return $this->Options;
    }

    public function setOptions(array $options): BuilderInterface
    {
        if ($this->Options !== null) {
            throw new LogicException('Builder options is already set.');
        }

        $this->getV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator()->resolve($options);

        $this->Options = $options;

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
