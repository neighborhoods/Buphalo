<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Writer\Builder\Factory;

use Neighborhoods\Bradfab\SupportingActor\Writer\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorWriterBuilderFactory;

    public function setSupportingActorWriterBuilderFactory(FactoryInterface $WriterBuilderFactory): self
    {
        if ($this->hasSupportingActorWriterBuilderFactory()) {
            throw new \LogicException('SupportingActorWriterBuilderFactory is already set.');
        }
        $this->SupportingActorWriterBuilderFactory = $WriterBuilderFactory;

        return $this;
    }

    protected function getSupportingActorWriterBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorWriterBuilderFactory()) {
            throw new \LogicException('SupportingActorWriterBuilderFactory is not set.');
        }

        return $this->SupportingActorWriterBuilderFactory;
    }

    protected function hasSupportingActorWriterBuilderFactory(): bool
    {
        return isset($this->SupportingActorWriterBuilderFactory);
    }

    protected function unsetSupportingActorWriterBuilderFactory(): self
    {
        if (!$this->hasSupportingActorWriterBuilderFactory()) {
            throw new \LogicException('SupportingActorWriterBuilderFactory is not set.');
        }
        unset($this->SupportingActorWriterBuilderFactory);

        return $this;
    }
}
