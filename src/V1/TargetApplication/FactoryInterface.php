<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TargetApplication;

use Neighborhoods\Buphalo\V1\TargetApplicationInterface;

interface FactoryInterface
{
    public function create(): TargetApplicationInterface;
}
