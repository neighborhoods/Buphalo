<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\VersionUpgrade\Bradfab;

use LogicException;
use Neighborhoods\Buphalo\V1\Logger\AwareTrait;
use SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class FileUpgrader implements FileUpgraderInterface
{
    use AwareTrait;

    private const REGEX_QUOTE_REPLACEMENT_PATTERN = "/^ {%d}'(<PrimaryActorName>.*)':$/m";
    private const REGEX_QUOTE_REPLACEMENT_REPLACE = '$1:';

    private const INDENT_SIZE = 2;

    /** @var SplFileInfo */
    private $oldFile;

    public function upgrade(): FileUpgraderInterface
    {
        $oldFilePath = $this->getOldFile()->getPathname();
        $newFilePath = str_replace(self::FILE_EXTENSION_OLD, self::FILE_EXTENSION_NEW, $oldFilePath);

        $this->getLogger()->notice(
            sprintf('Uprading %s to %s', $oldFilePath, $newFilePath),
            [
                'old_file' => $oldFilePath,
                'new_file' => $newFilePath
            ]
        );

        $oldData = Yaml::parseFile($oldFilePath, Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE);

        $newData = ['actors' => []];

        foreach ($oldData['supporting_actors'] as $oldActorPath => $oldActorData) {
            $newActorPath = '<PrimaryActorName>' . DIRECTORY_SEPARATOR . $oldActorPath;
            $newData['actors'][$newActorPath] = [
                    'template' => 'PrimaryActorName' . DIRECTORY_SEPARATOR . $oldActorPath
                ] + ($oldActorData ?? []);
        }

        $yaml = Yaml::dump($newData, PHP_INT_MAX, self::INDENT_SIZE);
        $yaml = $this->cleanYaml($yaml);

        $fh = fopen($newFilePath, 'w');
        fwrite($fh, $yaml);

        return $this;
    }

    private function getOldFile(): SplFileInfo
    {
        if ($this->oldFile === null) {
            throw new LogicException('Upgrader oldFile has not been set.');
        }

        return $this->oldFile;
    }

    public function setOldFile(SplFileInfo $oldFile): FileUpgraderInterface
    {
        if ($this->oldFile !== null) {
            throw new LogicException('Upgrader oldFile is already set.');
        }

        $this->oldFile = $oldFile;

        return $this;
    }

    private function cleanYaml(string $yaml): string
    {
        $regex = sprintf(self::REGEX_QUOTE_REPLACEMENT_PATTERN, self::INDENT_SIZE);
        $replacement = str_repeat(' ', self::INDENT_SIZE) . self::REGEX_QUOTE_REPLACEMENT_REPLACE;
        $yaml = preg_replace($regex, $replacement, $yaml);
        return $yaml;
    }
}
