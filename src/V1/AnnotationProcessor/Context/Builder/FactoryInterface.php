<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Context\Builder;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\Context\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
