<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Builder;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
