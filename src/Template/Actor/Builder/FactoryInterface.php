<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Template\Actor\Builder;

use Neighborhoods\Bradfab\Template\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
