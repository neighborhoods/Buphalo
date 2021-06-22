<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Buphalo;

use Neighborhoods\Buphalo\V2\BuphaloInterface;

interface FactoryInterface
{
    public function create(): BuphaloInterface;
}
