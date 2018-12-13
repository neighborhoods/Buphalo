<?php
declare(strict_types=1);

namespace Rhift\Bradfab\StringMap\Factory;

use Rhift\Bradfab\StringMap\FactoryInterface;

trait AwareTrait
{
    protected $StringMapFactory;

    public function setStringMapFactory(FactoryInterface $StringMapFactory): self
    {
        if ($this->hasStringMapFactory()) {
            throw new \LogicException('StringMapFactory is already set.');
        }
        $this->StringMapFactory = $StringMapFactory;

        return $this;
    }

    protected function getStringMapFactory(): FactoryInterface
    {
        if (!$this->hasStringMapFactory()) {
            throw new \LogicException('StringMapFactory is not set.');
        }

        return $this->StringMapFactory;
    }

    protected function hasStringMapFactory(): bool
    {
        return isset($this->StringMapFactory);
    }

    protected function unsetStringMapFactory(): self
    {
        if (!$this->hasStringMapFactory()) {
            throw new \LogicException('StringMapFactory is not set.');
        }
        unset($this->StringMapFactory);

        return $this;
    }
}
