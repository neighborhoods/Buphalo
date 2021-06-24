<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TargetApplication;

use Neighborhoods\Buphalo\V2\TargetApplicationInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TargetApplicationInterface
    {
        return clone $this->getTargetApplication();
    }
}
