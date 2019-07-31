<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map\Repository;

use LogicException;
use Neighborhoods\Bradfab\TemplateTree\Map\RepositoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabTemplateTreeMapRepository;

    public function setTemplateTreeMapRepository(RepositoryInterface $templateTreeMapRepository): self
    {
        if ($this->hasTemplateTreeMapRepository()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Repository is already set.');
        }
        $this->NeighborhoodsBradfabTemplateTreeMapRepository = $templateTreeMapRepository;

        return $this;
    }

    protected function getTemplateTreeMapRepository(): RepositoryInterface
    {
        if (!$this->hasTemplateTreeMapRepository()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Repository is not set.');
        }

        return $this->NeighborhoodsBradfabTemplateTreeMapRepository;
    }

    protected function hasTemplateTreeMapRepository(): bool
    {
        return isset($this->NeighborhoodsBradfabTemplateTreeMapRepository);
    }

    protected function unsetTemplateTreeMapRepository(): self
    {
        if (!$this->hasTemplateTreeMapRepository()) {
            throw new LogicException('Neighborhoods Bradfab TemplateTree Map Repository is not set.');
        }
        unset($this->NeighborhoodsBradfabTemplateTreeMapRepository);

        return $this;
    }
}
