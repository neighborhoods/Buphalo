<?php

namespace Neighborhoods\Buphalo\Phar;

use AppendIterator;
use FilesystemIterator;
use GlobIterator;
use Iterator;
use LogicException;
use Phar;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Throwable;
use RuntimeException;

final class Builder implements BuilderInterface
{
    private const FILE_EXTENSION_BACKUP = '.bak';

    /** @var string */
    private $phar_alias;

    /** @var string */
    private $application_root_path;

    /** @var string */
    private $entry_point;

    /** @var string */
    private $phar_location;

    /** @var int */
    private $flags;

    /** @var string[] */
    private $include_directories = [];

    /** @var string[] */
    private $include_files = [];

    /** @var SearchReplacementInterface[] */
    private $entry_point_replacements = [];

    public function build()
    {
        try {
            $this->makeBackup();

            $phar = new Phar($this->getPharLocation(), $this->getFlags(), $this->getPharAlias());

            $pharEntryPointPath = $this->copyEntryPointFile();

            $phar->buildFromIterator($this->buildIterator(), $this->getApplicationRootPath());

            $phar->setStub($phar->createDefaultStub($pharEntryPointPath));
        } catch (Throwable $t) {
            $this->restoreBackup();
            throw $t;
        } finally {
            $this->removeBackup();

            $filename = $this->getPharEntryPointPath();
            if (is_file($filename)) {
                unlink($filename);
            }
        }


    }

    private function getPharEntryPointPath() : string
    {
        return preg_replace('/(.php)?$/','-phar\1', $this->getEntryPoint());
    }

    private function copyEntryPointFile() : string
    {
        $entryPointPath = $this->getEntryPoint();
        $pharEntryPointPath = $this->getPharEntryPointPath();

        if (!is_file($entryPointPath)) {
            throw new RuntimeException("File $entryPointPath not found.");
        }

        $entryPointData = file($entryPointPath);
        if (strpos(current($entryPointData), '#!') === 0) {
            // Remove #! line which are only usable via shell, not via phar
            array_shift($entryPointData);
        }

        $fh = fopen($pharEntryPointPath, 'w');

        foreach ($entryPointData as $line) {
            foreach($this->getEntryPointReplacements() as $searchReplacement) {
                $line = str_replace($searchReplacement->getSearch(), $searchReplacement->getReplacement(), $line);
            }
            fwrite($fh, $line);
        }

        $this->addIncludeFile($pharEntryPointPath);

        return $pharEntryPointPath;
    }

    private function getPharAlias(): string
    {
        if ($this->phar_alias === null) {
            throw new LogicException('Builder phar_alias has not been set.');
        }

        return $this->phar_alias;
    }

    public function setPharAlias(string $phar_alias): BuilderInterface
    {
        if ($this->phar_alias !== null) {
            throw new LogicException('Builder phar_alias is already set.');
        }

        $this->phar_alias = $phar_alias;

        return $this;
    }

    private function getApplicationRootPath(): string
    {
        if ($this->application_root_path === null) {
            throw new LogicException('Builder application_root_path has not been set.');
        }

        return $this->application_root_path;
    }

    public function setApplicationRootPath(string $application_root_path): BuilderInterface
    {
        if ($this->application_root_path !== null) {
            throw new LogicException('Builder application_root_path is already set.');
        }

        $this->application_root_path = $application_root_path;

        return $this;
    }

    private function getEntryPoint(): string
    {
        if ($this->entry_point === null) {
            throw new LogicException('Builder entry_point has not been set.');
        }

        return $this->entry_point;
    }

    public function setEntryPoint(string $entry_point): BuilderInterface
    {
        if ($this->entry_point !== null) {
            throw new LogicException('Builder entry_point is already set.');
        }

        $this->entry_point = $entry_point;

        return $this;
    }

    private function getPharLocation(): string
    {
        if ($this->phar_location === null) {
            throw new LogicException('Builder phar_location has not been set.');
        }

        return $this->phar_location;
    }

    public function setPharLocation(string $phar_location): BuilderInterface
    {
        if ($this->phar_location !== null) {
            throw new LogicException('Builder phar_location is already set.');
        }

        $this->phar_location = $phar_location;

        return $this;
    }

    private function getFlags(): int
    {
        if ($this->flags === null) {
            $this->flags = self::DEFAULT_FLAGS;
        }

        return $this->flags;
    }

    public function setFlags(int $flags): BuilderInterface
    {
        if ($this->flags !== null) {
            throw new LogicException('Builder flags is already set.');
        }

        $this->flags = $flags;

        return $this;
    }

    private function getIncludeDirectories(): array
    {
        if ($this->include_directories === null) {
            throw new \LogicException('Builder include_directories has not been set.');
        }

        return $this->include_directories;
    }

    public function addIncludeDirectory(string $directory): BuilderInterface
    {
        $this->include_directories[] = $directory;

        return $this;
    }

    private function getIncludeFiles(): array
    {
        if ($this->include_files === null) {
            throw new \LogicException('Builder include_files has not been set.');
        }

        return $this->include_files;
    }

    public function addIncludeFile(string $file): BuilderInterface
    {
        $this->include_files[] = $file;

        return $this;
    }

    private function buildIterator(): Iterator
    {
        $iterator = new AppendIterator();

        foreach ($this->getIncludeDirectories() as $directory) {
            $path = $this->getApplicationRootPath() . DIRECTORY_SEPARATOR . $directory;

            if (!is_dir($path)) {
                continue;
            }

            $directoryIterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)
            );

            $iterator->append($directoryIterator);
        }

        foreach ($this->getIncludeFiles() as $file) {
            $path = $this->getApplicationRootPath() . DIRECTORY_SEPARATOR . $file;

            if (!is_file($path)) {
                continue;
            }

            $fileIterator = new GlobIterator($path);

            $iterator->append($fileIterator);
        }

        return $iterator;
    }

    private function makeBackup(): void
    {
        if (is_file($this->getPharLocation())) {
            rename($this->getPharLocation(), $this->getPharLocation() . self::FILE_EXTENSION_BACKUP);
        }
    }

    private function restoreBackup(): void
    {
        if (is_file($this->getPharLocation() . self::FILE_EXTENSION_BACKUP)) {
            rename($this->getPharLocation() . self::FILE_EXTENSION_BACKUP, $this->getPharLocation());
        }
    }

    private function removeBackup(): void
    {
        if (is_file($this->getPharLocation() . self::FILE_EXTENSION_BACKUP)) {
            unlink($this->getPharLocation() . self::FILE_EXTENSION_BACKUP);
        }
    }

    public function addEntryPointReplacement(string $search, string $replacement)
    {
        $patternReplacement = new SearchReplacement();
        $patternReplacement->setSearch($search)->setReplacement($replacement);

        $this->entry_point_replacements[] = $patternReplacement;
    }

    /** @return SearchReplacementInterface[] */
    private function getEntryPointReplacements(): array
    {
        if ($this->entry_point_replacements === null) {
            throw new \LogicException('Builder entry_point_replacements has not been set.');
        }

        return $this->entry_point_replacements;
    }

}
