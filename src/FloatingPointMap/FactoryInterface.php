<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FloatingPointMap;

use Neighborhoods\Bradfab\FloatingPointMapInterface;

interface FactoryInterface
{
    public function create(): FloatingPointMapInterface;
}
