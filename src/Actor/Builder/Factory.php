<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Builder;

use Neighborhoods\Buphalo\Actor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorBuilder();
    }
}
