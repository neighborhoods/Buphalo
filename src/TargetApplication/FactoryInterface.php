<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetApplication;

use Rhift\Bradfab\TargetApplicationInterface;

interface FactoryInterface
{
    public function create(): TargetApplicationInterface;
}
