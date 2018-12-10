<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Repository;

use Rhift\Bradfab\Template\Actor\RepositoryInterface;

trait AwareTrait
{
    protected $RhiftBradfabTemplateActorRepository;

    public function setBradfabTemplateActorRepository(RepositoryInterface $bradfabTemplateActorRepository): self
    {
        if ($this->hasBradfabTemplateActorRepository()) {
            throw new \LogicException('RhiftBradfabTemplateActorRepository is already set.');
        }
        $this->RhiftBradfabTemplateActorRepository = $bradfabTemplateActorRepository;

        return $this;
    }

    protected function getBradfabTemplateActorRepository(): RepositoryInterface
    {
        if (!$this->hasBradfabTemplateActorRepository()) {
            throw new \LogicException('RhiftBradfabTemplateActorRepository is not set.');
        }

        return $this->RhiftBradfabTemplateActorRepository;
    }

    protected function hasBradfabTemplateActorRepository(): bool
    {
        return isset($this->RhiftBradfabTemplateActorRepository);
    }

    protected function unsetBradfabTemplateActorRepository(): self
    {
        if (!$this->hasBradfabTemplateActorRepository()) {
            throw new \LogicException('RhiftBradfabTemplateActorRepository is not set.');
        }
        unset($this->RhiftBradfabTemplateActorRepository);

        return $this;
    }
}
