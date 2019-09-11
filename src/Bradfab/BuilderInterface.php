<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Buphalo;

use Neighborhoods\Buphalo\BuphaloInterface;

interface BuilderInterface
{
    public function build(): BuphaloInterface;
}
