<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\BooleanMap;

use Neighborhoods\Bradfab\BooleanMapInterface;

interface FactoryInterface
{
    public function create(): BooleanMapInterface;
}
