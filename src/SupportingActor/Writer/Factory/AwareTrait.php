<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Writer\Factory;

use Neighborhoods\Bradfab\SupportingActor\Writer\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorWriterFactory;

    public function setSupportingActorWriterFactory(FactoryInterface $WriterFactory): self
    {
        if ($this->hasSupportingActorWriterFactory()) {
            throw new \LogicException('SupportingActorWriterFactory is already set.');
        }
        $this->SupportingActorWriterFactory = $WriterFactory;

        return $this;
    }

    protected function getSupportingActorWriterFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorWriterFactory()) {
            throw new \LogicException('SupportingActorWriterFactory is not set.');
        }

        return $this->SupportingActorWriterFactory;
    }

    protected function hasSupportingActorWriterFactory(): bool
    {
        return isset($this->SupportingActorWriterFactory);
    }

    protected function unsetSupportingActorWriterFactory(): self
    {
        if (!$this->hasSupportingActorWriterFactory()) {
            throw new \LogicException('SupportingActorWriterFactory is not set.');
        }
        unset($this->SupportingActorWriterFactory);

        return $this;
    }
}
