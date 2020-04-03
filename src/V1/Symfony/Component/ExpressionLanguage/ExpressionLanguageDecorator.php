<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Symfony\Component\ExpressionLanguage;

use Neighborhoods\Buphalo\V1\Symfony\Component\ExpressionLanguage;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;
use Symfony\Component\ExpressionLanguage\ParsedExpression;

class ExpressionLanguageDecorator implements ExpressionLanguageDecoratorInterface
{
    use ExpressionLanguage\ExpressionLanguageDecorator\AwareTrait;
    use ExpressionLanguage\ExpressionLanguage\AwareTrait;

    public function compile($expression, array $names = []) : string
    {
        if ($this->hasV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()) {
            $result = $this->getV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()->compile($expression, $names);
        } else {
            $result = $this->getExpressionLanguage()->compile($expression, $names);
        }

        return $result;
    }

    public function evaluate($expression, array $values = [])
    {
        if ($this->hasV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()) {
            $result = $this->getV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()->evaluate($expression, $values);
        } else {
            $result = $this->getExpressionLanguage()->evaluate($expression, $values);
        }

        return $result;
    }

    public function parse($expression, array $names) : ParsedExpression
    {
        if ($this->hasV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()) {
            $result = $this->getV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()->parse($expression, $names);
        } else {
            $result = $this->getExpressionLanguage()->parse($expression, $names);
        }

        return $result;
    }

    public function register(string $name, callable $compiler, callable $evaluator) : ExpressionLanguageDecoratorInterface
    {
        if ($this->hasV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()) {
            $this->getV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()->register($name, $compiler, $evaluator);
        } else {
            $this->getExpressionLanguage()->register($name, $compiler, $evaluator);
        }

        return $this;
    }

    public function addFunction(ExpressionFunction $function) : ExpressionLanguageDecoratorInterface
    {
        if ($this->hasV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()) {
            $this->getV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()
                ->register($function->getName(), $function->getCompiler(), $function->getEvaluator());
        } else {
            $this->getExpressionLanguage()
                ->register($function->getName(), $function->getCompiler(), $function->getEvaluator());
        }

        return $this;
    }

    public function registerProvider(ExpressionFunctionProviderInterface $provider) : ExpressionLanguageDecoratorInterface
    {
        if ($this->hasV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()) {
            $this->getV1SymfonyComponentExpressionLanguageExpressionLanguageDecorator()->registerProvider($provider);
        } else {
            $this->getExpressionLanguage()->registerProvider($provider);
        }

        return $this;
    }
}
