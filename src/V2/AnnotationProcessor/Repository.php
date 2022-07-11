<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor;

use Neighborhoods\Buphalo\V2\AnnotationProcessorInterface;
use Neighborhoods\Buphalo\V2\AnnotationProcessor;

class Repository implements RepositoryInterface
{
    use AnnotationProcessor\Map\Factory\AwareTrait;

    protected $map;

    public function getByFQCN(string $annotationProcessorFQCN): AnnotationProcessorInterface
    {
        return new $annotationProcessorFQCN();
    }
}
