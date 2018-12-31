<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Tokenizer\Factory;

use Neighborhoods\Bradfab\TargetActor\Template\Tokenizer\FactoryInterface;

trait AwareTrait
{
    protected $TargetActorTemplateTokenizerFactory;

    public function setTargetActorTemplateTokenizerFactory(FactoryInterface $TokenizerFactory): self
    {
        if ($this->hasTargetActorTemplateTokenizerFactory()) {
            throw new \LogicException('TargetActorTemplateTokenizerFactory is already set.');
        }
        $this->TargetActorTemplateTokenizerFactory = $TokenizerFactory;

        return $this;
    }

    protected function getTargetActorTemplateTokenizerFactory(): FactoryInterface
    {
        if (!$this->hasTargetActorTemplateTokenizerFactory()) {
            throw new \LogicException('TargetActorTemplateTokenizerFactory is not set.');
        }

        return $this->TargetActorTemplateTokenizerFactory;
    }

    protected function hasTargetActorTemplateTokenizerFactory(): bool
    {
        return isset($this->TargetActorTemplateTokenizerFactory);
    }

    protected function unsetTargetActorTemplateTokenizerFactory(): self
    {
        if (!$this->hasTargetActorTemplateTokenizerFactory()) {
            throw new \LogicException('TargetActorTemplateTokenizerFactory is not set.');
        }
        unset($this->TargetActorTemplateTokenizerFactory);

        return $this;
    }
}
