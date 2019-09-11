<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Writer;

use Neighborhoods\Buphalo\Actor\WriterInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): WriterInterface
    {
        return clone $this->getActorWriter();
    }
}
