<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Fabricator;

use Neighborhoods\Buphalo\FabricatorInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    public function build(): FabricatorInterface
    {
        return $this->getFabricatorFactory()->create();
    }
}
