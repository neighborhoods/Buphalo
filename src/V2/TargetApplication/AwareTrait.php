<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TargetApplication;

use LogicException;
use Neighborhoods\Buphalo\V2\TargetApplicationInterface;

trait AwareTrait
{
    protected $TargetApplication;

    public function setTargetApplication(TargetApplicationInterface $TargetApplication): self
    {
        if ($this->hasTargetApplication()) {
            throw new LogicException('TargetApplication is already set.');
        }
        $this->TargetApplication = $TargetApplication;

        return $this;
    }

    protected function getTargetApplication(): TargetApplicationInterface
    {
        if (!$this->hasTargetApplication()) {
            throw new LogicException('TargetApplication is not set.');
        }

        return $this->TargetApplication;
    }

    protected function hasTargetApplication(): bool
    {
        return isset($this->TargetApplication);
    }

    protected function unsetTargetApplication(): self
    {
        if (!$this->hasTargetApplication()) {
            throw new LogicException('TargetApplication is not set.');
        }
        unset($this->TargetApplication);

        return $this;
    }
}
