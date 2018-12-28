<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\StringMap;

use Neighborhoods\Bradfab\StringMapInterface;

interface FactoryInterface
{
    public function create(): StringMapInterface;
}
