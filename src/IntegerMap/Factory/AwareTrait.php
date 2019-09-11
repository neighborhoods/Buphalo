<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\IntegerMap\Factory;

use LogicException;
use Neighborhoods\Buphalo\IntegerMap\FactoryInterface;

trait AwareTrait
{
    protected $IntegerMapFactory;

    public function setIntegerMapFactory(FactoryInterface $IntegerMapFactory): self
    {
        if ($this->hasIntegerMapFactory()) {
            throw new LogicException('IntegerMapFactory is already set.');
        }
        $this->IntegerMapFactory = $IntegerMapFactory;

        return $this;
    }

    protected function getIntegerMapFactory(): FactoryInterface
    {
        if (!$this->hasIntegerMapFactory()) {
            throw new LogicException('IntegerMapFactory is not set.');
        }

        return $this->IntegerMapFactory;
    }

    protected function hasIntegerMapFactory(): bool
    {
        return isset($this->IntegerMapFactory);
    }

    protected function unsetIntegerMapFactory(): self
    {
        if (!$this->hasIntegerMapFactory()) {
            throw new LogicException('IntegerMapFactory is not set.');
        }
        unset($this->IntegerMapFactory);

        return $this;
    }
}
