<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator;

use Neighborhoods\Bradfab\FabricatorInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    public function build(): FabricatorInterface
    {
        $fabricator = $this->getFabricatorFactory()->create();

        // @TODO - build the object.

        return $fabricator;
    }
}
