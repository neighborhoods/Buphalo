<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Protean\Container\Builder;

use LogicException;
use Neighborhoods\Buphalo\V2\Protean\Container\BuilderInterface;

trait AwareTrait
{
    protected $ProteanContainerBuilder;

    public function setProteanContainerBuilder(BuilderInterface $proteanContainerBuilder): self
    {
        if ($this->hasProteanContainerBuilder()) {
            throw new LogicException('ProteanContainerBuilder is already set.');
        }
        $this->ProteanContainerBuilder = $proteanContainerBuilder;

        return $this;
    }

    protected function getProteanContainerBuilder(): BuilderInterface
    {
        if (!$this->hasProteanContainerBuilder()) {
            throw new LogicException('ProteanContainerBuilder is not set.');
        }

        return $this->ProteanContainerBuilder;
    }

    protected function hasProteanContainerBuilder(): bool
    {
        return isset($this->ProteanContainerBuilder);
    }

    protected function unsetProteanContainerBuilder(): self
    {
        if (!$this->hasProteanContainerBuilder()) {
            throw new LogicException('ProteanContainerBuilder is not set.');
        }
        unset($this->ProteanContainerBuilder);

        return $this;
    }
}
