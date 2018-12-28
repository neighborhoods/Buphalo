<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Map\Builder;

use Neighborhoods\Bradfab\AnnotationProcessor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
