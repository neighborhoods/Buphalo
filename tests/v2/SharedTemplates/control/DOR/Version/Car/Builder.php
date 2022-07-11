<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car;

use LogicException;
use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\CarInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): CarInterface
    {
        $Car = $this->getDORVersionCarFactory()->create();

        $record = $this->getRecord();

        $Car->setYear($record['year']);
        $Car->setMake($record['make']);
        $Car->setModel($record['model']);

        return $Car;
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
