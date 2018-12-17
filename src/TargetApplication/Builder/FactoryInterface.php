<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetApplication\Builder;

use Rhift\Bradfab\TargetApplication\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
