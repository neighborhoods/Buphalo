<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Map\Builder;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
