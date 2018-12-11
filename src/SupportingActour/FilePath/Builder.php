<?php
declare(strict_types=1);

namespace Rhift\BradFab\SupportingActour\FilePath;

use Rhift\BradFab\SupportingActour\FilePathInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    /** @var array */
    protected $record;

    public function build(): FilePathInterface
    {
        $actor = $this->getFilePathFactory()->create();

        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');

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
