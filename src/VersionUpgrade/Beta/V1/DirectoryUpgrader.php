<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\VersionUpgrade\Beta\V1;

use LogicException;
use Neighborhoods\Bradfab\Logger;
use SplFileInfo;
use Symfony\Component\Finder\Finder;

class DirectoryUpgrader implements DirectoryUpgraderInterface
{
    use Logger\AwareTrait;

    /** @var string */
    private $directory;

    /** @var int */
    private $num_files_processed;

    public function upgrade(): DirectoryUpgraderInterface
    {
        $this->setNumFilesProcessed(0);

        $finder = new Finder();
        $finder->name('*' . FileUpgraderInterface::FILE_EXTENSION_OLD)->in($this->getDirectory());

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            // TODO: Replace with Factory
            $upgrader = new FileUpgrader();
            $upgrader->setOldFile($file);
            $upgrader->setLogger($this->getLogger());
            $upgrader->upgrade();

            $this->incrementNumFilesProcessed();
        }

        $this->getLogger()->info(
            sprintf('Successfully processed %d file(s)', $this->getNumFilesProcessed()),
            [
                'num_files_processed' => $this->getNumFilesProcessed()
            ]
        );

        return $this;
    }

    private function getDirectory(): string
    {
        if ($this->directory === null) {
            throw new LogicException('DirectoryUpgrader directory has not been set.');
        }

        return $this->directory;
    }

    public function setDirectory(string $directory): DirectoryUpgraderInterface
    {
        if ($this->directory !== null) {
            throw new LogicException('DirectoryUpgrader directory is already set.');
        }

        $this->directory = $directory;

        return $this;
    }

    private function incrementNumFilesProcessed()
    {
        $this->num_files_processed++;
    }

    public function getNumFilesProcessed(): int
    {
        if ($this->num_files_processed === null) {
            throw new LogicException('DirectoryUpgrader num_files_processed has not been set.');
        }

        return $this->num_files_processed;
    }

    private function setNumFilesProcessed(int $num_files_processed): DirectoryUpgraderInterface
    {
        if ($this->num_files_processed !== null) {
            throw new LogicException('DirectoryUpgrader num_files_processed is already set.');
        }

        $this->num_files_processed = $num_files_processed;

        return $this;
    }
}
