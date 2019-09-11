<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Buphalo;

use Neighborhoods\Buphalo\BuphaloInterface;

interface FactoryInterface
{
    public function create(): BuphaloInterface;
}
