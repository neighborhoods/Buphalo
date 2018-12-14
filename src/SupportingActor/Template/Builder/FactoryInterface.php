<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Builder;

use Rhift\Bradfab\SupportingActor\Template\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
