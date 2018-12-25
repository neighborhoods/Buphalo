<?php
declare(strict_types=1);

namespace Rhift\Bradfab\BooleanMap;

use Rhift\Bradfab\BooleanMapInterface;

interface FactoryInterface
{
    public function create(): BooleanMapInterface;
}
