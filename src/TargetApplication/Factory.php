<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetApplication;

use Rhift\Bradfab\TargetApplicationInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TargetApplicationInterface
    {
        return clone $this->getTargetApplication();
    }
}
