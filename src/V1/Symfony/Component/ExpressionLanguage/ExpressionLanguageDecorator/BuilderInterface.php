<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Symfony\Component\ExpressionLanguage\ExpressionLanguageDecorator;

use Neighborhoods\Buphalo\V1\Symfony\Component\ExpressionLanguage\ExpressionLanguageDecoratorInterface;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;

interface BuilderInterface
{
    public function build(): ExpressionLanguageDecoratorInterface;

    public function addExpressionFunction(ExpressionFunction $expressionFunction): BuilderInterface;
}
