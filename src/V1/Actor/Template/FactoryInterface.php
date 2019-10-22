<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template;

use Neighborhoods\Buphalo\V1\Actor\TemplateInterface;

interface FactoryInterface
{
    public function create(): TemplateInterface;
}
