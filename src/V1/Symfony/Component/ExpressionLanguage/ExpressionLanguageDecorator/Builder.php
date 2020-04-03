<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Symfony\Component\ExpressionLanguage\ExpressionLanguageDecorator;

use LogicException;
use Neighborhoods\Buphalo\V1\Symfony\Component\ExpressionLanguage\ExpressionLanguageDecoratorInterface;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    private $expressionFunctions;

    private function getExpressionFunctions(): array
    {
        if ($this->expressionFunctions === null) {
            throw new LogicException('Expression Functions has not been set.');
        }
        return $this->expressionFunctions;
    }

    public function addExpressionFunction(ExpressionFunction $expressionFunction): BuilderInterface
    {
        $this->expressionFunctions[] = $expressionFunction;
        return $this;
    }

    public function build(): ExpressionLanguageDecoratorInterface
    {
        $ExpressionLanguageDecorator = $this->getV1SymfonyComponentExpressionLanguageExpressionLanguageDecoratorFactory()->create();

        foreach ($this->getExpressionFunctions() as $expressionFunction) {
            $ExpressionLanguageDecorator->addFunction($expressionFunction);
        }

        return $ExpressionLanguageDecorator;
    }
}
