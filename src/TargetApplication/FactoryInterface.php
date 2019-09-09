<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TargetApplication;

use Neighborhoods\Buphalo\TargetApplicationInterface;

interface FactoryInterface
{
    public function create(): TargetApplicationInterface;
}
