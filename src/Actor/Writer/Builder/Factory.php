<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer\Builder;

use Neighborhoods\Bradfab\Actor\Writer\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorWriterBuilder();
    }
}
