<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

interface BuilderInterface
{
    public function setRecord(array $record): BuilderInterface;
}
