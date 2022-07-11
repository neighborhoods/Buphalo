<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorNameInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): PrimaryActorNameInterface
    {
        $PrimaryActorName = $this->getNamespacedPrimaryActorNameFactory()->create();

        $record = $this->getRecord();

/** @neighborhoods-buphalo:annotation-processor DaoBuilder
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
