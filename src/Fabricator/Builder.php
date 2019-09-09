<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator;

use Neighborhoods\Bradfab\FabricatorInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    public function build(): FabricatorInterface
    {
        return $this->getFabricatorFactory()->create();
    }
}
