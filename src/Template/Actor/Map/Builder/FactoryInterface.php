<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Map\Builder;

use Rhift\Bradfab\Template\Actor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
