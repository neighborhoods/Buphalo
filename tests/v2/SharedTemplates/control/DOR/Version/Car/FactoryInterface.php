<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car;

use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\CarInterface;

interface FactoryInterface
{
    public function create(): CarInterface;
}
