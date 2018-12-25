<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Builder;

use Rhift\Bradfab\AnnotationProcessor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
