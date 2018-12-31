<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template;

use Neighborhoods\Bradfab\TargetActor\TemplateInterface;

interface FactoryInterface
{
    public function create(): TemplateInterface;
}
