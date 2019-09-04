<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Logger;

use Psr\Log\LoggerInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabLogger;

    public function setLogger(LoggerInterface $logger) : self
    {
        if ($this->hasLogger()) {
            throw new \LogicException('NeighborhoodsBradfabLogger is already set.');
        }
        $this->NeighborhoodsBradfabLogger = $logger;

        return $this;
    }

    protected function getLogger() : LoggerInterface
    {
        if (!$this->hasLogger()) {
            throw new \LogicException('NeighborhoodsBradfabLogger is not set.');
        }

        return $this->NeighborhoodsBradfabLogger;
    }

    protected function hasLogger() : bool
    {
        return isset($this->NeighborhoodsBradfabLogger);
    }

    protected function unsetLogger() : self
    {
        if (!$this->hasLogger()) {
            throw new \LogicException('NeighborhoodsBradfabLogger is not set.');
        }
        unset($this->NeighborhoodsBradfabLogger);

        return $this;
    }
}
