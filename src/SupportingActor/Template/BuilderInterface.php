<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor\TemplateInterface;

interface BuilderInterface
{
    public function build(): TemplateInterface;

    public function setRecord(array $record): BuilderInterface;
}
