<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication;

use Neighborhoods\Bradfab\TargetApplicationInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TargetApplicationInterface
    {
        return clone $this->getTargetApplication();
    }
}
