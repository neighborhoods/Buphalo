<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor;

use Rhift\Bradfab\AnnotationProcessorInterface;
use Rhift\Bradfab\AnnotationProcessor;

class Repository implements RepositoryInterface
{
    use AnnotationProcessor\Map\Factory\AwareTrait;

    protected $map;

    public function getByFQCN(string $fqcn): AnnotationProcessorInterface
    {
        return new $fqcn;
    }
}
