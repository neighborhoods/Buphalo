<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\DOR\Version\WrittenFile;

use LogicException;
use Neighborhoods\BuphaloTest\DOR\Version\WrittenFileInterface;

trait AwareTrait
{
    protected $DORVersionWrittenFile;

    public function setDORVersionWrittenFile(WrittenFileInterface $WrittenFile): self
    {
        if ($this->hasDORVersionWrittenFile()) {
            throw new LogicException('DORVersionWrittenFile is already set.');
        }
        $this->DORVersionWrittenFile = $WrittenFile;

        return $this;
    }

    protected function getDORVersionWrittenFile(): WrittenFileInterface
    {
        if (!$this->hasDORVersionWrittenFile()) {
            throw new LogicException('DORVersionWrittenFile is not set.');
        }

        return $this->DORVersionWrittenFile;
    }

    protected function hasDORVersionWrittenFile(): bool
    {
        return isset($this->DORVersionWrittenFile);
    }

    protected function unsetDORVersionWrittenFile(): self
    {
        if (!$this->hasDORVersionWrittenFile()) {
            throw new LogicException('DORVersionWrittenFile is not set.');
        }
        unset($this->DORVersionWrittenFile);

        return $this;
    }
}
