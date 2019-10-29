<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\PrimaryActorName;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\PrimaryActorNameInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): PrimaryActorNameInterface
    {
        $PrimaryActorName = $this->getPrimaryActorNameFactory()->create();
        /** @neighborhoods-buphalo:annotation-processor Neighborhoods\Buphalo\PrimaryActorName\Builder.build1
         */
        /** @neighborhoods-buphalo:annotation-processor Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Builder.build2
        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');
         */

        return $PrimaryActorName;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
