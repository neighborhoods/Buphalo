<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessors;

use Neighborhoods\Buphalo\V1;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class SimpleString implements V1\AnnotationProcessorInterface
{
    use V1\AnnotationProcessor\Context\AwareTrait {
        getAnnotationProcessorContext as public;
    }

    public const CONTEXT_KEY_STRING = 'string';

    public function getReplacement(): string
    {
        $staticContextRecord = $this->getAnnotationProcessorContext()->getStaticContextRecord();

        return $staticContextRecord[self::CONTEXT_KEY_STRING];
    }


}
