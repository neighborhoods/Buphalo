<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    /** @var array */
    protected $record;

    public function build(): ActorInterface
    {
        $actor = $this->getActorFactory()->create();

        // @TODO - build the object.

        return $actor;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new \LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new \LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
