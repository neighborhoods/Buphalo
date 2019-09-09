<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Bradfab;

use Neighborhoods\Bradfab\BradfabInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    public function build(): BradfabInterface
    {
        return $this->getBradfabFactory()->create();
    }
}
