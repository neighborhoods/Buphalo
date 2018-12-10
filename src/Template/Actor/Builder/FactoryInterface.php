<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Builder;

use Rhift\Bradfab\Template\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
