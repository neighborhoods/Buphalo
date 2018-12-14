<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FloatMap\Factory;

use Rhift\Bradfab\FloatMap\FactoryInterface;

trait AwareTrait
{
    protected $FloatMapFactory;

    public function setFloatMapFactory(FactoryInterface $FloatMapFactory): self
    {
        if ($this->hasFloatMapFactory()) {
            throw new \LogicException('FloatMapFactory is already set.');
        }
        $this->FloatMapFactory = $FloatMapFactory;

        return $this;
    }

    protected function getFloatMapFactory(): FactoryInterface
    {
        if (!$this->hasFloatMapFactory()) {
            throw new \LogicException('FloatMapFactory is not set.');
        }

        return $this->FloatMapFactory;
    }

    protected function hasFloatMapFactory(): bool
    {
        return isset($this->FloatMapFactory);
    }

    protected function unsetFloatMapFactory(): self
    {
        if (!$this->hasFloatMapFactory()) {
            throw new \LogicException('FloatMapFactory is not set.');
        }
        unset($this->FloatMapFactory);

        return $this;
    }
}
