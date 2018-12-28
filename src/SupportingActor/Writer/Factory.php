<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Writer;

use Neighborhoods\Bradfab\SupportingActor\WriterInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): WriterInterface
    {
        return clone $this->getSupportingActorWriter();
    }
}
