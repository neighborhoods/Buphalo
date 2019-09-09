<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication;

use Neighborhoods\Bradfab\TargetApplicationInterface;

interface RepositoryInterface
{
    public function get(): TargetApplicationInterface;
}
