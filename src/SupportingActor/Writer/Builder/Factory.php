<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Writer\Builder;

use Rhift\Bradfab\SupportingActor\Writer\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getSupportingActorWriterBuilder();
    }
}
