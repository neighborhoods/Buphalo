<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Writer\FactoryInterface;

trait AwareTrait
{
    protected $ActorWriterFactory;

    public function setActorWriterFactory(FactoryInterface $WriterFactory): self
    {
        if ($this->hasActorWriterFactory()) {
            throw new LogicException('ActorWriterFactory is already set.');
        }
        $this->ActorWriterFactory = $WriterFactory;

        return $this;
    }

    protected function getActorWriterFactory(): FactoryInterface
    {
        if (!$this->hasActorWriterFactory()) {
            throw new LogicException('ActorWriterFactory is not set.');
        }

        return $this->ActorWriterFactory;
    }

    protected function hasActorWriterFactory(): bool
    {
        return isset($this->ActorWriterFactory);
    }

    protected function unsetActorWriterFactory(): self
    {
        if (!$this->hasActorWriterFactory()) {
            throw new LogicException('ActorWriterFactory is not set.');
        }
        unset($this->ActorWriterFactory);

        return $this;
    }
}
