<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer;

use Neighborhoods\Bradfab\Actor\WriterInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): WriterInterface
    {
        return clone $this->getActorWriter();
    }
}
