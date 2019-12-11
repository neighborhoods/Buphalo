<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor;

use Neighborhoods\Buphalo\V1\AnnotationProcessorInterface;
use Neighborhoods\Buphalo\V1\AnnotationProcessor;

class Repository implements RepositoryInterface
{
    use AnnotationProcessor\Map\Factory\AwareTrait;

    protected $map;

    public function getByFQCN(string $annotationProcessorFQCN): AnnotationProcessorInterface
    {
        return new $annotationProcessorFQCN();
    }
}
