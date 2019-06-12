<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template;

use Neighborhoods\Bradfab\SupportingActor\TemplateInterface;

interface FactoryInterface
{
    public function create(): TemplateInterface;
}
