<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template;

use Neighborhoods\Buphalo\V2\Actor\TemplateInterface;

interface FactoryInterface
{
    public function create(): TemplateInterface;
}
