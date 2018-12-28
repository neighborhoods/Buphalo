<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Writer\Builder;

use Neighborhoods\Bradfab\SupportingActor\Writer\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorWriterBuilder;

    public function setSupportingActorWriterBuilder(BuilderInterface $WriterBuilder): self
    {
        if ($this->hasSupportingActorWriterBuilder()) {
            throw new \LogicException('SupportingActorWriterBuilder is already set.');
        }
        $this->SupportingActorWriterBuilder = $WriterBuilder;

        return $this;
    }

    protected function getSupportingActorWriterBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorWriterBuilder()) {
            throw new \LogicException('SupportingActorWriterBuilder is not set.');
        }

        return $this->SupportingActorWriterBuilder;
    }

    protected function hasSupportingActorWriterBuilder(): bool
    {
        return isset($this->SupportingActorWriterBuilder);
    }

    protected function unsetSupportingActorWriterBuilder(): self
    {
        if (!$this->hasSupportingActorWriterBuilder()) {
            throw new \LogicException('SupportingActorWriterBuilder is not set.');
        }
        unset($this->SupportingActorWriterBuilder);

        return $this;
    }
}
