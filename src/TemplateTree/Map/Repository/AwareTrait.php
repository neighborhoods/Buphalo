<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Map\Repository;

use LogicException;
use Neighborhoods\Buphalo\TemplateTree\Map\RepositoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloTemplateTreeMapRepository;

    public function setTemplateTreeMapRepository(RepositoryInterface $templateTreeMapRepository): self
    {
        if ($this->hasTemplateTreeMapRepository()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Repository is already set.');
        }
        $this->NeighborhoodsBuphaloTemplateTreeMapRepository = $templateTreeMapRepository;

        return $this;
    }

    protected function getTemplateTreeMapRepository(): RepositoryInterface
    {
        if (!$this->hasTemplateTreeMapRepository()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Repository is not set.');
        }

        return $this->NeighborhoodsBuphaloTemplateTreeMapRepository;
    }

    protected function hasTemplateTreeMapRepository(): bool
    {
        return isset($this->NeighborhoodsBuphaloTemplateTreeMapRepository);
    }

    protected function unsetTemplateTreeMapRepository(): self
    {
        if (!$this->hasTemplateTreeMapRepository()) {
            throw new LogicException('Neighborhoods Buphalo TemplateTree Map Repository is not set.');
        }
        unset($this->NeighborhoodsBuphaloTemplateTreeMapRepository);

        return $this;
    }
}
