<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Buphalo;

use Neighborhoods\Buphalo\V1\BuphaloInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    public function build(): BuphaloInterface
    {
        return $this->getBuphaloFactory()->create();
    }
}
