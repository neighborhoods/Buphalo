<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\DOR\V1\WrittenFile;

use LogicException;
use Neighborhoods\BuphaloTest\DOR\V1\WrittenFileInterface;

trait AwareTrait
{
    protected $DORV1WrittenFile;

    public function setDORV1WrittenFile(WrittenFileInterface $WrittenFile): self
    {
        if ($this->hasDORV1WrittenFile()) {
            throw new LogicException('DORV1WrittenFile is already set.');
        }
        $this->DORV1WrittenFile = $WrittenFile;

        return $this;
    }

    protected function getDORV1WrittenFile(): WrittenFileInterface
    {
        if (!$this->hasDORV1WrittenFile()) {
            throw new LogicException('DORV1WrittenFile is not set.');
        }

        return $this->DORV1WrittenFile;
    }

    protected function hasDORV1WrittenFile(): bool
    {
        return isset($this->DORV1WrittenFile);
    }

    protected function unsetDORV1WrittenFile(): self
    {
        if (!$this->hasDORV1WrittenFile()) {
            throw new LogicException('DORV1WrittenFile is not set.');
        }
        unset($this->DORV1WrittenFile);

        return $this;
    }
}
