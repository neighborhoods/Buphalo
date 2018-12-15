<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\StringMapInterface;

interface SupportingActorInterface
{
    public function getRelativeClassName(): string;

    public function getAwareOf(): StringMapInterface;

    public function setRelativeClassName(string $relative_class_name): SupportingActorInterface;

    public function setAwareOf(StringMapInterface $aware): SupportingActorInterface;
}
