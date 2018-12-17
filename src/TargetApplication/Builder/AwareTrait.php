<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetApplication\Builder;

use Rhift\Bradfab\TargetApplication\BuilderInterface;

trait AwareTrait
{
    protected $TargetApplicationBuilder;

    public function setTargetApplicationBuilder(BuilderInterface $TargetApplicationBuilder): self
    {
        if ($this->hasTargetApplicationBuilder()) {
            throw new \LogicException('TargetApplicationBuilder is already set.');
        }
        $this->TargetApplicationBuilder = $TargetApplicationBuilder;

        return $this;
    }

    protected function getTargetApplicationBuilder(): BuilderInterface
    {
        if (!$this->hasTargetApplicationBuilder()) {
            throw new \LogicException('TargetApplicationBuilder is not set.');
        }

        return $this->TargetApplicationBuilder;
    }

    protected function hasTargetApplicationBuilder(): bool
    {
        return isset($this->TargetApplicationBuilder);
    }

    protected function unsetTargetApplicationBuilder(): self
    {
        if (!$this->hasTargetApplicationBuilder()) {
            throw new \LogicException('TargetApplicationBuilder is not set.');
        }
        unset($this->TargetApplicationBuilder);

        return $this;
    }
}
