<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Writer\Builder;

use Neighborhoods\Bradfab\SupportingActor\Writer\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getSupportingActorWriterBuilder();
    }
}
