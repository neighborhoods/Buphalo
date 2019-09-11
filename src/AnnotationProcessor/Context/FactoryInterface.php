<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Context;

use Neighborhoods\Buphalo\AnnotationProcessor\ContextInterface;

interface FactoryInterface
{
    public function create(): ContextInterface;
}
