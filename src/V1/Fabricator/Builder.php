<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Fabricator;

use Neighborhoods\Buphalo\V1\FabricatorInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    public function build(): FabricatorInterface
    {
        return $this->getFabricatorFactory()->create();
    }
}
