<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Map;

use Rhift\Bradfab\FabricationFile\SupportingActor\MapInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    /** @var array */
    protected $record;

    public function build(): MapInterface
    {
        $map = $this->getSupportingActorMapFactory()->create();

        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');

        return $map;
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
