<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Writer\FactoryInterface;

trait AwareTrait
{
    protected $TargetActorWriterFactory;

    public function setTargetActorWriterFactory(FactoryInterface $WriterFactory): self
    {
        if ($this->hasTargetActorWriterFactory()) {
            throw new LogicException('TargetActorWriterFactory is already set.');
        }
        $this->TargetActorWriterFactory = $WriterFactory;

        return $this;
    }

    protected function getTargetActorWriterFactory(): FactoryInterface
    {
        if (!$this->hasTargetActorWriterFactory()) {
            throw new LogicException('TargetActorWriterFactory is not set.');
        }

        return $this->TargetActorWriterFactory;
    }

    protected function hasTargetActorWriterFactory(): bool
    {
        return isset($this->TargetActorWriterFactory);
    }

    protected function unsetTargetActorWriterFactory(): self
    {
        if (!$this->hasTargetActorWriterFactory()) {
            throw new LogicException('TargetActorWriterFactory is not set.');
        }
        unset($this->TargetActorWriterFactory);

        return $this;
    }
}
