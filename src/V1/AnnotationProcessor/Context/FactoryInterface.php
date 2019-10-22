<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Context;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\ContextInterface;

interface FactoryInterface
{
    public function create(): ContextInterface;
}
