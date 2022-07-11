<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor\Builder;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
