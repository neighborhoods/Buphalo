<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FloatingPointMap\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\FloatingPointMap\FactoryInterface;

trait AwareTrait
{
    protected $FloatingPointMapFactory;

    public function setFloatingPointMapFactory(FactoryInterface $FloatingPointMapFactory): self
    {
        if ($this->hasFloatingPointMapFactory()) {
            throw new LogicException('FloatingPointMapFactory is already set.');
        }
        $this->FloatingPointMapFactory = $FloatingPointMapFactory;

        return $this;
    }

    protected function getFloatingPointMapFactory(): FactoryInterface
    {
        if (!$this->hasFloatingPointMapFactory()) {
            throw new LogicException('FloatingPointMapFactory is not set.');
        }

        return $this->FloatingPointMapFactory;
    }

    protected function hasFloatingPointMapFactory(): bool
    {
        return isset($this->FloatingPointMapFactory);
    }

    protected function unsetFloatingPointMapFactory(): self
    {
        if (!$this->hasFloatingPointMapFactory()) {
            throw new LogicException('FloatingPointMapFactory is not set.');
        }
        unset($this->FloatingPointMapFactory);

        return $this;
    }
}
