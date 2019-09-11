<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TargetApplication;

use Neighborhoods\Buphalo\TargetApplicationInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TargetApplicationInterface
    {
        return clone $this->getTargetApplication();
    }
}
