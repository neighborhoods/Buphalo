<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Writer;

use LogicException;
use Neighborhoods\Buphalo\V2\Actor\WriterInterface;

trait AwareTrait
{
    protected $ActorWriter;

    public function setActorWriter(WriterInterface $Writer): self
    {
        if ($this->hasActorWriter()) {
            throw new LogicException('ActorWriter is already set.');
        }
        $this->ActorWriter = $Writer;

        return $this;
    }

    protected function getActorWriter(): WriterInterface
    {
        if (!$this->hasActorWriter()) {
            throw new LogicException('ActorWriter is not set.');
        }

        return $this->ActorWriter;
    }

    protected function hasActorWriter(): bool
    {
        return isset($this->ActorWriter);
    }

    protected function unsetActorWriter(): self
    {
        if (!$this->hasActorWriter()) {
            throw new LogicException('ActorWriter is not set.');
        }
        unset($this->ActorWriter);

        return $this;
    }
}
