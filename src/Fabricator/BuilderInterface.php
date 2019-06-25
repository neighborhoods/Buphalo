<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator;

use Neighborhoods\Bradfab\FabricatorInterface;

interface BuilderInterface
{
    public function build(): FabricatorInterface;
}
