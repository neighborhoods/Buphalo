<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Writer;

use Neighborhoods\Bradfab\TargetActor\WriterInterface;

trait AwareTrait
{
    protected $TargetActorWriter;

    public function setTargetActorWriter(WriterInterface $Writer): self
    {
        if ($this->hasTargetActorWriter()) {
            throw new \LogicException('TargetActorWriter is already set.');
        }
        $this->TargetActorWriter = $Writer;

        return $this;
    }

    protected function getTargetActorWriter(): WriterInterface
    {
        if (!$this->hasTargetActorWriter()) {
            throw new \LogicException('TargetActorWriter is not set.');
        }

        return $this->TargetActorWriter;
    }

    protected function hasTargetActorWriter(): bool
    {
        return isset($this->TargetActorWriter);
    }

    protected function unsetTargetActorWriter(): self
    {
        if (!$this->hasTargetActorWriter()) {
            throw new \LogicException('TargetActorWriter is not set.');
        }
        unset($this->TargetActorWriter);

        return $this;
    }
}
