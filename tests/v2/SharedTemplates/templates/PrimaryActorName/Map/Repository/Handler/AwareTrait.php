<?php

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\Template\PrimaryActorName\Map\Repository\Handler;

/**
 * @codeCoverageIgnore
 */
trait AwareTrait
{

    protected $NamespacedPrimaryActorNameMapRepositoryHandler = null;

    public function setNamespacedPrimaryActorNameMapRepositoryHandler(\Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\Repository\HandlerInterface $PrimaryActorNameMapRepositoryHandler) : self
    {
        if ($this->hasNamespacedPrimaryActorNameMapRepositoryHandler()) {
            throw new \LogicException('NamespacedPrimaryActorNameMapRepositoryHandler is already set.');
        }
        $this->NamespacedPrimaryActorNameMapRepositoryHandler = $PrimaryActorNameMapRepositoryHandler;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameMapRepositoryHandler() : \Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\Repository\HandlerInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameMapRepositoryHandler()) {
            throw new \LogicException('NamespacedPrimaryActorNameMapRepositoryHandler is not set.');
        }

        return $this->NamespacedPrimaryActorNameMapRepositoryHandler;
    }

    protected function hasNamespacedPrimaryActorNameMapRepositoryHandler() : bool
    {
        return isset($this->NamespacedPrimaryActorNameMapRepositoryHandler);
    }

    protected function unsetNamespacedPrimaryActorNameMapRepositoryHandler() : self
    {
        if (!$this->hasNamespacedPrimaryActorNameMapRepositoryHandler()) {
            throw new \LogicException('NamespacedPrimaryActorNameMapRepositoryHandler is not set.');
        }
        unset($this->NamespacedPrimaryActorNameMapRepositoryHandler);

        return $this;
    }


}

