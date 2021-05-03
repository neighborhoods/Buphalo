<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace\Builder\OptionsResolverDecorator;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace\Builder\OptionsResolverDecoratorInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator;

    public function setV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator(
        OptionsResolverDecoratorInterface $v1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator
    ): self {
        if ($this->hasV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator()) {
            throw new LogicException('Neighborhoods Buphalo V1 Actor Template Tokenizer Rule StrReplace Builder OptionsResolverDecorator is already set.');
        }
        $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator = $v1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator;

        return $this;
    }

    protected function getV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator(
    ): OptionsResolverDecoratorInterface
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator()) {
            throw new LogicException('Neighborhoods Buphalo V1 Actor Template Tokenizer Rule StrReplace Builder OptionsResolverDecorator is not set.');
        }

        return $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator;
    }

    protected function hasV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator(): bool
    {
        return isset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator);
    }

    protected function unsetV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator(): self
    {
        if (!$this->hasV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator()) {
            throw new LogicException('Neighborhoods Buphalo V1 Actor Template Tokenizer Rule StrReplace Builder OptionsResolverDecorator is not set.');
        }
        unset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRuleStrReplaceBuilderOptionsResolverDecorator);

        return $this;
    }
}
