<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetActor\Builder;

use Rhift\Bradfab\TargetActor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
