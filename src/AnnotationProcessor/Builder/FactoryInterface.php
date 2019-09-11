<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Builder;

use Neighborhoods\Buphalo\AnnotationProcessor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
