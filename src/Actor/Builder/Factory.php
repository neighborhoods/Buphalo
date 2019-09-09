<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Builder;

use Neighborhoods\Bradfab\Actor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorBuilder();
    }
}
