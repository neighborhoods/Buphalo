<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace\Builder;

use Closure;
use Neighborhoods\Buphalo\V1;

class OptionsResolverDecorator implements OptionsResolverDecoratorInterface
{
    use V1\Symfony\Component\OptionsResolver\OptionsResolver\AwareTrait;

    public function setDefault($option, $value): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->setDefault($option, $value);

        return $this;
    }

    public function setDefaults(array $defaults): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->setDefaults($defaults);

        return $this;
    }

    public function hasDefault(string $option): bool
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->hasDefault($option);
    }

    public function setRequired($optionNames): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->setRequired($optionNames);

        return $this;
    }

    public function isRequired($option): bool
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->isRequired($option);
    }

    public function getRequiredOptions(): array
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->getRequiredOptions();
    }

    public function isMissing($option): bool
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->isMissing($option);
    }

    public function getMissingOptions(): array
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->getMissingOptions();
    }

    public function setDefined($optionNames): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->setDefined($optionNames);

        return $this;
    }

    public function isDefined($option): bool
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->isDefined($option);
    }

    public function getDefinedOptions(): array
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->getDefinedOptions();
    }

    public function isNested(string $option): bool
    {
        return isset($this->nested[$option]);
    }

    public function setDeprecated(
        string $option,
        $deprecationMessage = 'The option "%name%" is deprecated.'
    ): OptionsResolverDecoratorInterface {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->setDeprecated($option, $deprecationMessage);

        return $this;
    }

    public function isDeprecated(string $option): bool
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->isDeprecated($option);
    }

    public function setNormalizer($option, Closure $normalizer): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->setNormalizer($option, $normalizer);

        return $this;
    }

    public function addNormalizer(
        string $option,
        Closure $normalizer,
        bool $forcePrepend = false
    ): OptionsResolverDecoratorInterface {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()
            ->addNormalizer($option, $normalizer, $forcePrepend);

        return $this;
    }

    public function setAllowedValues($option, $allowedValues): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->setAllowedValues($option, $allowedValues);

        return $this;
    }

    public function addAllowedValues($option, $allowedValues): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->addAllowedValues($option, $allowedValues);

        return $this;
    }

    public function setAllowedTypes($option, $allowedTypes): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->setAllowedTypes($option, $allowedTypes);

        return $this;
    }

    public function addAllowedTypes($option, $allowedTypes): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->addAllowedTypes($option, $allowedTypes);

        return $this;
    }

    public function remove($optionNames): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->remove($optionNames);

        return $this;
    }

    public function clear(): OptionsResolverDecoratorInterface
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->clear();

        return $this;
    }

    public function resolve(array $options = []): array
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->resolve($options);
    }

    public function offsetGet($option)
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->offsetGet($option);
    }

    public function offsetExists($option): bool
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->offsetExists($option);
    }

    public function offsetSet($option, $value): void
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->offsetSet($option, $value);
    }

    public function offsetUnset($option): void
    {
        $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->offsetUnset($option);
    }

    public function count(): int
    {
        return $this->getV1SymfonyComponentOptionsResolverOptionsResolver()->count();
    }
}
