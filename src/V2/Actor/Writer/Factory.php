<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Writer;

use Neighborhoods\Buphalo\V2\Actor\WriterInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): WriterInterface
    {
        return clone $this->getActorWriter();
    }
}
