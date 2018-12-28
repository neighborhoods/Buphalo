<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Builder;

use Neighborhoods\Bradfab\SupportingActor\Template\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
