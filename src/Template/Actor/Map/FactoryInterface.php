<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Map;

use Rhift\Bradfab\Template\Actor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
