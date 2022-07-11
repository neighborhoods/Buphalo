<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TargetApplication;

use Neighborhoods\Buphalo\V2\TargetApplicationInterface;

interface BuilderInterface
{
    public function build(): TargetApplicationInterface;
}
