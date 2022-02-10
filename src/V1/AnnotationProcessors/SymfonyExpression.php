<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessors;

use Neighborhoods\Buphalo\V1;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection Because PHPStorm doesn't register the alias*/
class SymfonyExpression implements V1\AnnotationProcessorInterface
{
    use V1\AnnotationProcessor\Context\AwareTrait {
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
