<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication;

use Neighborhoods\Bradfab\TargetApplicationInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;


    public function build(): TargetApplicationInterface
    {
        return $this->getTargetApplicationFactory()->create();
    }
}
