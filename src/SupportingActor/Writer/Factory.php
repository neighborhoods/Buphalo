<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Writer;

use Rhift\Bradfab\SupportingActor\WriterInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): WriterInterface
    {
        return clone $this->getSupportingActorWriter();
    }
}
