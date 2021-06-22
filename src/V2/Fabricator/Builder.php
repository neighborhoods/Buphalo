<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Fabricator;

use Neighborhoods\Buphalo\V2\FabricatorInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    public function build(): FabricatorInterface
    {
        return $this->getFabricatorFactory()->create();
    }
}
