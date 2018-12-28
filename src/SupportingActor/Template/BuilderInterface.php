<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template;

use Neighborhoods\Bradfab\SupportingActor\TemplateInterface;

interface BuilderInterface
{
    public function build(): TemplateInterface;

    public function setRecord(array $record): BuilderInterface;
}
