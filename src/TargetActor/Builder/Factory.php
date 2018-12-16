<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetActor\Builder;

use Rhift\Bradfab\TargetActor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTargetActorBuilder();
    }
}
