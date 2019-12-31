<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\PregReplace\Builder\OptionsResolverDecorator;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\PregReplace\Builder\OptionsResolverDecoratorInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator;

    public function setV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator(
        OptionsResolverDecoratorInterface $v1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator
    ): self {
        if ($this->hasV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator()) {
            throw new LogicException('Neighborhoods Buphalo V1 Actor Template Tokenizer Rule PregReplace Builder OptionsResolverDecorator is already set.');
        }
        $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator = $v1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator;

        return $this;
    }

    protected function getV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator(
    ): OptionsResolverDecoratorInterface
    {
        if (!$this->hasV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator()) {
            throw new LogicException('Neighborhoods Buphalo V1 Actor Template Tokenizer Rule PregReplace Builder OptionsResolverDecorator is not set.');
        }

        return $this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator;
    }

    protected function hasV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator(): bool
    {
        return isset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator);
    }

    protected function unsetV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator(): self
    {
        if (!$this->hasV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator()) {
            throw new LogicException('Neighborhoods Buphalo V1 Actor Template Tokenizer Rule PregReplace Builder OptionsResolverDecorator is not set.');
        }
        unset($this->NeighborhoodsBuphaloV1ActorTemplateTokenizerRulePregReplaceBuilderOptionsResolverDecorator);

        return $this;
    }
}
