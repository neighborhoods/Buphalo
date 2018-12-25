<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FloatingPointMap;

use Rhift\Bradfab\FloatingPointMapInterface;

interface FactoryInterface
{
    public function create(): FloatingPointMapInterface;
}
