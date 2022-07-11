<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Logger;

use LogicException;
use Psr\Log\LoggerInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloLogger;

    public function setLogger(LoggerInterface $logger) : self
    {
        if ($this->hasLogger()) {
            throw new LogicException('NeighborhoodsBuphaloLogger is already set.');
        }
        $this->NeighborhoodsBuphaloLogger = $logger;

        return $this;
    }

    protected function getLogger() : LoggerInterface
    {
        if (!$this->hasLogger()) {
            throw new LogicException('NeighborhoodsBuphaloLogger is not set.');
        }

        return $this->NeighborhoodsBuphaloLogger;
    }

    protected function hasLogger() : bool
    {
        return isset($this->NeighborhoodsBuphaloLogger);
    }

    protected function unsetLogger() : self
    {
        if (!$this->hasLogger()) {
            throw new LogicException('NeighborhoodsBuphaloLogger is not set.');
        }
        unset($this->NeighborhoodsBuphaloLogger);

        return $this;
    }
}
