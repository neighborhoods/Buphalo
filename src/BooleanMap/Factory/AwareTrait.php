<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\BooleanMap\Factory;

use LogicException;
use Neighborhoods\Bradfab\BooleanMap\FactoryInterface;

trait AwareTrait
{
    protected $BooleanMapFactory;

    public function setBooleanMapFactory(FactoryInterface $BooleanMapFactory): self
    {
        if ($this->hasBooleanMapFactory()) {
            throw new LogicException('BooleanMapFactory is already set.');
        }
        $this->BooleanMapFactory = $BooleanMapFactory;

        return $this;
    }

    protected function getBooleanMapFactory(): FactoryInterface
    {
        if (!$this->hasBooleanMapFactory()) {
            throw new LogicException('BooleanMapFactory is not set.');
        }

        return $this->BooleanMapFactory;
    }

    protected function hasBooleanMapFactory(): bool
    {
        return isset($this->BooleanMapFactory);
    }

    protected function unsetBooleanMapFactory(): self
    {
        if (!$this->hasBooleanMapFactory()) {
            throw new LogicException('BooleanMapFactory is not set.');
        }
        unset($this->BooleanMapFactory);

        return $this;
    }
}
