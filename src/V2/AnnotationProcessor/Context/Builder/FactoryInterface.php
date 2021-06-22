<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor\Context\Builder;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\Context\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
