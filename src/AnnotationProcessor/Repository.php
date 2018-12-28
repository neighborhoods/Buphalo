<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor;

use Neighborhoods\Bradfab\AnnotationProcessorInterface;
use Neighborhoods\Bradfab\AnnotationProcessor;

class Repository implements RepositoryInterface
{
    use AnnotationProcessor\Map\Factory\AwareTrait;

    protected $map;

    public function getByFQCN(string $annotationProcessorFQCN): AnnotationProcessorInterface
    {
        return new $annotationProcessorFQCN;
    }
}
