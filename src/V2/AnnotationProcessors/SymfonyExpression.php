<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessors;

use Neighborhoods\Buphalo\V2;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection Because PHPStorm doesn't register the alias*/
class SymfonyExpression implements V2\AnnotationProcessorInterface
{
    use V2\AnnotationProcessor\Context\AwareTrait {
        getAnnotationProcessorContext as public;
    }

    public const CONTEXT_KEY_EXPRESSION = 'expression';

    public function getReplacement(): string
    {
        $context = $this->getAnnotationProcessorContext()->getStaticContextRecord();


        $expressionLanguage = new ExpressionLanguage();
        return (string) $expressionLanguage->evaluate(
            $context[self::CONTEXT_KEY_EXPRESSION],
            [
                'context' => $this->getAnnotationProcessorContext()
            ]
        );
    }
}
