#!/usr/bin/env php
<?php
declare(strict_types=1);
error_reporting(E_ALL);

$pharFileName = 'buphalo.phar';
$applicationRootDirectoryPath = dirname(__DIR__);
$entryFileRelativePath = 'bin/buphalo.php';
$pharFilePath = sprintf('%s/bin/%s', $applicationRootDirectoryPath, $pharFileName);

$pharOut = new PharOut();
$pharOut
    ->setPharAlias($pharFileName)
    ->setApplicationRootPath($applicationRootDirectoryPath)
    ->setEntryPoint($entryFileRelativePath)
    ->setPharLocation($pharFilePath)
;

$pharOut->buildPhar();

final class PharOut
{
    public const DEFAULT_FLAGS = FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME;

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

    public function buildPhar()
    {
        $phar = new Phar(
            $this->getPharLocation(),
            $this->getFlags(),
            $this->getPharAlias()
        );

        $this->copyPharEntrypoint();

        // TODO: Ignore `.idea` directory
        $phar->buildFromIterator(
            new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($this->getApplicationRootPath(), FilesystemIterator::SKIP_DOTS)
            ),
            $this->getApplicationRootPath()
        );

        $phar->setStub($phar->createDefaultStub($this->getEntryPoint()));
    }

    private function copyPharEntrypoint(): PharOut
    {
        $originalFile = $this->getEntryPoint();

        return $this;
    }

    private function getPharAlias(): string
    {
        if ($this->phar_alias === null) {
            throw new LogicException('PharOut phar_name has not been set.');
        }

        return $this->phar_alias;
    }

    public function setPharAlias(string $phar_alias): self
    {
        if ($this->phar_alias !== null) {
            throw new LogicException('PharOut phar_name is already set.');
        }

        $this->phar_alias = $phar_alias;

        return $this;
    }

    private function getApplicationRootPath(): string
    {
        if ($this->application_root_path === null) {
            throw new LogicException('PharOut application_root_path has not been set.');
        }

        return $this->application_root_path;
    }

    public function setApplicationRootPath(string $application_root_path): self
    {
        if ($this->application_root_path !== null) {
            throw new LogicException('PharOut application_root_path is already set.');
        }

        $this->application_root_path = $application_root_path;

        return $this;
    }

    private function getEntryPoint(): string
    {
        if ($this->entry_point === null) {
            throw new LogicException('PharOut entry_point has not been set.');
        }

        return $this->entry_point;
    }

    public function setEntryPoint(string $entry_point): self
    {
        if ($this->entry_point !== null) {
            throw new LogicException('PharOut entry_point is already set.');
        }

        $this->entry_point = $entry_point;

        return $this;
    }

    private function getPharLocation(): string
    {
        if ($this->phar_location === null) {
            throw new LogicException('PharOut phar_location has not been set.');
        }

        return $this->phar_location;
    }

    public function setPharLocation(string $phar_location): self
    {
        if ($this->phar_location !== null) {
            throw new LogicException('PharOut phar_location is already set.');
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

    public function setFlags(int $flags): self
    {
        if ($this->flags !== null) {
            throw new LogicException('PharOut flags is already set.');
        }

        $this->flags = $flags;

        return $this;
    }
}

