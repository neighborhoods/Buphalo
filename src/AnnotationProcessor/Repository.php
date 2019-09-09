<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor;

use Neighborhoods\Buphalo\AnnotationProcessorInterface;
use Neighborhoods\Buphalo\AnnotationProcessor;

class Repository implements RepositoryInterface
{
    use AnnotationProcessor\Map\Factory\AwareTrait;

    protected $map;

    public function getByFQCN(string $annotationProcessorFQCN): AnnotationProcessorInterface
    {
        return new $annotationProcessorFQCN;
    }
}
