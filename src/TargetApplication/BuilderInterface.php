<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetApplication;

use Rhift\Bradfab\TargetApplicationInterface;

interface BuilderInterface
{
    public function build(): TargetApplicationInterface;

    public function setRecord(array $record): BuilderInterface;
}
