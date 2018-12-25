<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

interface BuilderInterface
{
    public function build(): ActorInterface;

    public function setRecord(array $record): BuilderInterface;
}
