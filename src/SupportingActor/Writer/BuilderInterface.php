<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Writer;

use Neighborhoods\Bradfab\SupportingActor\WriterInterface;

interface BuilderInterface
{
    public function build(): WriterInterface;

    public function setRecord(array $record): BuilderInterface;
}
