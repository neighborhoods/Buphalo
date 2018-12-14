<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor;

interface TemplateInterface
{

    public function getContents(): string;
}
