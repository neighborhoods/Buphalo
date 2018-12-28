<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication;

use Neighborhoods\Bradfab\TargetApplicationInterface;

interface FactoryInterface
{
    public function create(): TargetApplicationInterface;
}
