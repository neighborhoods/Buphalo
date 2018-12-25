<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\Builder;

use Rhift\Bradfab\FabricationFile\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileBuilder();
    }
}
