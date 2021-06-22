<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Symfony\Component\Finder\Finder;

use LogicException;
use Symfony\Component\Finder\Finder;

trait AwareTrait
{
    protected $SymfonyComponentFinderFinder;

    public function setSymfonyComponentFinderFinder(Finder $Finder): self
    {
        if ($this->hasSymfonyComponentFinderFinder()) {
            throw new LogicException('SymfonyComponentFinderFinder is already set.');
        }
        $this->SymfonyComponentFinderFinder = $Finder;

        return $this;
    }

    protected function getSymfonyComponentFinderFinder(): Finder
    {
        if (!$this->hasSymfonyComponentFinderFinder()) {
            throw new LogicException('SymfonyComponentFinderFinder is not set.');
        }

        return $this->SymfonyComponentFinderFinder;
    }

    protected function hasSymfonyComponentFinderFinder(): bool
    {
        return isset($this->SymfonyComponentFinderFinder);
    }

    protected function unsetSymfonyComponentFinderFinder(): self
    {
        if (!$this->hasSymfonyComponentFinderFinder()) {
            throw new LogicException('SymfonyComponentFinderFinder is not set.');
        }
        unset($this->SymfonyComponentFinderFinder);

        return $this;
    }
}
