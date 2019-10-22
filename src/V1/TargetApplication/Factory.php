<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TargetApplication;

use Neighborhoods\Buphalo\V1\TargetApplicationInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TargetApplicationInterface
    {
        return clone $this->getTargetApplication();
    }
}
