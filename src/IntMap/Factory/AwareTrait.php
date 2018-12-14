<?php
declare(strict_types=1);

namespace Rhift\Bradfab\IntMap\Factory;

use Rhift\Bradfab\IntMap\FactoryInterface;

trait AwareTrait
{
    protected $IntMapFactory;

    public function setIntMapFactory(FactoryInterface $IntMapFactory): self
    {
        if ($this->hasIntMapFactory()) {
            throw new \LogicException('IntMapFactory is already set.');
        }
        $this->IntMapFactory = $IntMapFactory;

        return $this;
    }

    protected function getIntMapFactory(): FactoryInterface
    {
        if (!$this->hasIntMapFactory()) {
            throw new \LogicException('IntMapFactory is not set.');
        }

        return $this->IntMapFactory;
    }

    protected function hasIntMapFactory(): bool
    {
        return isset($this->IntMapFactory);
    }

    protected function unsetIntMapFactory(): self
    {
        if (!$this->hasIntMapFactory()) {
            throw new \LogicException('IntMapFactory is not set.');
        }
        unset($this->IntMapFactory);

        return $this;
    }
}
