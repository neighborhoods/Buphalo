<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Tokenizer\Factory;

use LogicException;
use Neighborhoods\Buphalo\Actor\Template\Tokenizer\FactoryInterface;

trait AwareTrait
{
    protected $ActorTemplateTokenizerFactory;

    public function setActorTemplateTokenizerFactory(FactoryInterface $TokenizerFactory): self
    {
        if ($this->hasActorTemplateTokenizerFactory()) {
            throw new LogicException('ActorTemplateTokenizerFactory is already set.');
        }
        $this->ActorTemplateTokenizerFactory = $TokenizerFactory;

        return $this;
    }

    protected function getActorTemplateTokenizerFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateTokenizerFactory()) {
            throw new LogicException('ActorTemplateTokenizerFactory is not set.');
        }

        return $this->ActorTemplateTokenizerFactory;
    }

    protected function hasActorTemplateTokenizerFactory(): bool
    {
        return isset($this->ActorTemplateTokenizerFactory);
    }

    protected function unsetActorTemplateTokenizerFactory(): self
    {
        if (!$this->hasActorTemplateTokenizerFactory()) {
            throw new LogicException('ActorTemplateTokenizerFactory is not set.');
        }
        unset($this->ActorTemplateTokenizerFactory);

        return $this;
    }
}
