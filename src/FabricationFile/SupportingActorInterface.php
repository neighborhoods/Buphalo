<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\StringMapInterface;

interface SupportingActorInterface
{

    public function getRelativeClassName(): string;

    public function isEnabled(): bool;

    public function setEnabled(bool $enabled): SupportingActorInterface;

    public function getAware(): StringMapInterface;

    public function setRelativeClassName(string $relative_class_name): SupportingActorInterface;

    public function setAware(StringMapInterface $aware): SupportingActorInterface;
}
