<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessors;

use Neighborhoods\Buphalo\V1;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class EmptyString implements V1\AnnotationProcessorInterface
{
    use V1\AnnotationProcessor\Context\AwareTrait {
        getAnnotationProcessorContext as public;
    }

    public function getReplacement(): string
    {
        return '';
    }
}
