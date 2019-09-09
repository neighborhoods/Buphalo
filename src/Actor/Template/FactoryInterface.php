<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor\TemplateInterface;

interface FactoryInterface
{
    public function create(): TemplateInterface;
}
