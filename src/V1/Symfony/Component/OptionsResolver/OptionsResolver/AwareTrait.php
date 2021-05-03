<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Symfony\Component\OptionsResolver\OptionsResolver;

use LogicException;
use Symfony\Component\OptionsResolver\OptionsResolver;

trait AwareTrait
{
    protected $V1SymfonyComponentOptionsResolverOptionsResolver;

    public function setV1SymfonyComponentOptionsResolverOptionsResolver(OptionsResolver $OptionsResolver): self
    {
        if ($this->hasV1SymfonyComponentOptionsResolverOptionsResolver()) {
            throw new LogicException('V1SymfonyComponentOptionsResolverOptionsResolver is already set.');
        }
        $this->V1SymfonyComponentOptionsResolverOptionsResolver = $OptionsResolver;

        return $this;
    }

    protected function getV1SymfonyComponentOptionsResolverOptionsResolver(): OptionsResolver
    {
        if (!$this->hasV1SymfonyComponentOptionsResolverOptionsResolver()) {
            throw new LogicException('V1SymfonyComponentOptionsResolverOptionsResolver is not set.');
        }

        return $this->V1SymfonyComponentOptionsResolverOptionsResolver;
    }

    protected function hasV1SymfonyComponentOptionsResolverOptionsResolver(): bool
    {
        return isset($this->V1SymfonyComponentOptionsResolverOptionsResolver);
    }

    protected function unsetV1SymfonyComponentOptionsResolverOptionsResolver(): self
    {
        if (!$this->hasV1SymfonyComponentOptionsResolverOptionsResolver()) {
            throw new LogicException('V1SymfonyComponentOptionsResolverOptionsResolver is not set.');
        }
        unset($this->V1SymfonyComponentOptionsResolverOptionsResolver);

        return $this;
    }
}
