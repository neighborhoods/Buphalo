<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessors;

use Neighborhoods\Buphalo\V2;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class SimpleString implements V2\AnnotationProcessorInterface
{
    use V2\AnnotationProcessor\Context\AwareTrait {
        getAnnotationProcessorContext as public;
    }

    public function getReplacement(): string
    {
        $staticContextRecord = $this->getAnnotationProcessorContext()->getStaticContextRecord();

        return $staticContextRecord['string'];
    }


}
