<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Builder;

use Neighborhoods\Bradfab\AnnotationProcessor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
