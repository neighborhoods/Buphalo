<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Map\Builder;

use Neighborhoods\Buphalo\AnnotationProcessor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
