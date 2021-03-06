<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Buphalo;

use Neighborhoods\Buphalo\V1\BuphaloInterface;

interface FactoryInterface
{
    public function create(): BuphaloInterface;
}
