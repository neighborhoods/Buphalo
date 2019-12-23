<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Phar;

use FilesystemIterator;

interface BuilderInterface
{
    public const DEFAULT_FLAGS = FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME;

    public function build();

    public function setPharAlias(string $phar_alias): BuilderInterface;

    public function setApplicationRootPath(string $application_root_path): BuilderInterface;

    public function setEntryPoint(string $entry_point): BuilderInterface;

    public function setPharLocation(string $phar_location): BuilderInterface;

    public function setFlags(int $flags): BuilderInterface;

    public function addIncludeDirectory(string $directory): BuilderInterface;

    public function addIncludeFile(string $file): BuilderInterface;

    public function addEntryPointReplacement(string $search, string $replacement);
}
