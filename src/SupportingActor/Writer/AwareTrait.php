<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Writer;

use Rhift\Bradfab\SupportingActor\WriterInterface;

trait AwareTrait
{
    protected $SupportingActorWriter;

    public function setSupportingActorWriter(WriterInterface $Writer): self
    {
        if ($this->hasSupportingActorWriter()) {
            throw new \LogicException('SupportingActorWriter is already set.');
        }
        $this->SupportingActorWriter = $Writer;

        return $this;
    }

    protected function getSupportingActorWriter(): WriterInterface
    {
        if (!$this->hasSupportingActorWriter()) {
            throw new \LogicException('SupportingActorWriter is not set.');
        }

        return $this->SupportingActorWriter;
    }

    protected function hasSupportingActorWriter(): bool
    {
        return isset($this->SupportingActorWriter);
    }

    protected function unsetSupportingActorWriter(): self
    {
        if (!$this->hasSupportingActorWriter()) {
            throw new \LogicException('SupportingActorWriter is not set.');
        }
        unset($this->SupportingActorWriter);

        return $this;
    }
}
