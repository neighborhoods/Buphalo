<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetApplication\Builder\Factory;

use Rhift\Bradfab\TargetApplication\Builder\FactoryInterface;

trait AwareTrait
{
    protected $TargetApplicationBuilderFactory;

    public function setTargetApplicationBuilderFactory(FactoryInterface $TargetApplicationBuilderFactory): self
    {
        if ($this->hasTargetApplicationBuilderFactory()) {
            throw new \LogicException('TargetApplicationBuilderFactory is already set.');
        }
        $this->TargetApplicationBuilderFactory = $TargetApplicationBuilderFactory;

        return $this;
    }

    protected function getTargetApplicationBuilderFactory(): FactoryInterface
    {
        if (!$this->hasTargetApplicationBuilderFactory()) {
            throw new \LogicException('TargetApplicationBuilderFactory is not set.');
        }

        return $this->TargetApplicationBuilderFactory;
    }

    protected function hasTargetApplicationBuilderFactory(): bool
    {
        return isset($this->TargetApplicationBuilderFactory);
    }

    protected function unsetTargetApplicationBuilderFactory(): self
    {
        if (!$this->hasTargetApplicationBuilderFactory()) {
            throw new \LogicException('TargetApplicationBuilderFactory is not set.');
        }
        unset($this->TargetApplicationBuilderFactory);

        return $this;
    }
}
