<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map\Builder;

use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
