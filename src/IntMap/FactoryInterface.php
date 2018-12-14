<?php
declare(strict_types=1);

namespace Rhift\Bradfab\IntMap;

use Rhift\Bradfab\IntMapInterface;

interface FactoryInterface
{
    public function create(): IntMapInterface;
}
