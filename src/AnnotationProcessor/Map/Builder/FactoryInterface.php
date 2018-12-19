<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Map\Builder;

use Rhift\Bradfab\AnnotationProcessor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
