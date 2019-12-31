<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\PregReplace\Builder;

use Closure;
use Symfony\Component\OptionsResolver\Options;

interface OptionsResolverDecoratorInterface extends Options
{
    public function isDefined($option): bool;

    public function setAllowedValues($option, $allowedValues): OptionsResolverDecoratorInterface;

    public function setDefault($option, $value): OptionsResolverDecoratorInterface;

    public function addAllowedTypes($option, $allowedTypes): OptionsResolverDecoratorInterface;

    public function clear(): OptionsResolverDecoratorInterface;

    public function isNested(string $option): bool;

    public function setDefaults(array $defaults): OptionsResolverDecoratorInterface;

    public function resolve(array $options = []): array;

    public function addNormalizer(
        string $option,
        Closure $normalizer,
        bool $forcePrepend = false
    ): OptionsResolverDecoratorInterface;

    public function offsetSet($option, $value): void;

    public function addAllowedValues($option, $allowedValues): OptionsResolverDecoratorInterface;

    public function isRequired($option): bool;

    public function setDefined($optionNames): OptionsResolverDecoratorInterface;

    public function offsetUnset($option): void;

    public function isDeprecated(string $option): bool;

    public function getMissingOptions(): array;

    public function isMissing($option): bool;

    public function getRequiredOptions(): array;

    public function remove($optionNames): OptionsResolverDecoratorInterface;

    public function setNormalizer($option, Closure $normalizer): OptionsResolverDecoratorInterface;

    public function getDefinedOptions(): array;

    public function offsetGet($option);

    public function hasDefault(string $option): bool;

    public function offsetExists($option): bool;

    public function setRequired($optionNames): OptionsResolverDecoratorInterface;

    public function setDeprecated(
        string $option,
        $deprecationMessage = 'The option "%name%" is deprecated.'
    ): OptionsResolverDecoratorInterface;

    public function count(): int;

    public function setAllowedTypes($option, $allowedTypes): OptionsResolverDecoratorInterface;
}
