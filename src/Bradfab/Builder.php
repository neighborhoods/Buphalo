<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Buphalo;

use Neighborhoods\Buphalo\BuphaloInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    public function build(): BuphaloInterface
    {
        return $this->getBuphaloFactory()->create();
    }
}
