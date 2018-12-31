<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Writer;

use Neighborhoods\Bradfab\TargetActor\WriterInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): WriterInterface
    {
        return clone $this->getTargetActorWriter();
    }
}
