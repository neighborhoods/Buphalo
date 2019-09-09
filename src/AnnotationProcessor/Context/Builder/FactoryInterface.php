<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Context\Builder;

use Neighborhoods\Buphalo\AnnotationProcessor\Context\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
