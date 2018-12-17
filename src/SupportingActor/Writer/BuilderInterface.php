<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Writer;

use Rhift\Bradfab\SupportingActor\WriterInterface;

interface BuilderInterface
{
    public function build(): WriterInterface;

    public function setRecord(array $record): BuilderInterface;
}
