<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor\Context;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\ContextInterface;

interface FactoryInterface
{
    public function create(): ContextInterface;
}
