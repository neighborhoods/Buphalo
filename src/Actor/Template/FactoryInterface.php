<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template;

use Neighborhoods\Buphalo\Actor\TemplateInterface;

interface FactoryInterface
{
    public function create(): TemplateInterface;
}
