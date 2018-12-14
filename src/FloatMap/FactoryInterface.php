<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FloatMap;

use Rhift\Bradfab\FloatMapInterface;

interface FactoryInterface
{
    public function create(): FloatMapInterface;
}
