<?php
declare(strict_types=1);

namespace Rhift\Bradfab\StringMap;

use Rhift\Bradfab\StringMapInterface;

interface FactoryInterface
{
    public function create(): StringMapInterface;
}
