<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

class TargetPrimaryActor implements TargetPrimaryActorInterface
{
    use FabricationFile\AwareTrait;
    use TargetApplication\AwareTrait;

    protected $relative_class_path;
    protected $namespace;
    protected $full_capital_camel_case_name;
    protected $source_directory_path;
    protected $fabrication_directory_path;
    protected $short_capital_camel_case_name;

    public function getRelativeClassPath(): string
    {
        if ($this->relative_class_path === null) {
            $filePath = $this->getSourceDirectoryPath();
            $relativeClassPath = ltrim(
                str_replace(
                    $this->getTargetApplication()->getSourceDirectoryPath(),
                    '',
                    $filePath
                ),
                '/'
            );
            $relativeClassPath = str_replace(
                '/',
                '\\',
                $relativeClassPath
            );
            $this->relative_class_path = $relativeClassPath;
        }

        return $this->relative_class_path;
    }

    public function getNamespacePrefix(): string
    {
        if ($this->namespace === null) {
            $namespace = $this->getTargetApplication()->getNamespace();
            $this->namespace = $namespace;
        }

        return $this->namespace;
    }

    public function getFullCapitalCamelCaseName(): string
    {
        if ($this->full_capital_camel_case_name === null) {
            $relativeClassPath = $this->getRelativeClassPath();
            $fullCapitalCamelCaseName = str_replace('\\', '', $relativeClassPath);
            $this->full_capital_camel_case_name = $fullCapitalCamelCaseName;
        }

        return $this->full_capital_camel_case_name;
    }

    public function getShortCapitalCamelCaseName(): string
    {
        if ($this->short_capital_camel_case_name === null) {
            $extensionRemoved = str_replace(
                FabricationFileInterface::FILE_EXTENSION_FABRICATION,
                '',
                $this->getFabricationFile()->getRelativeFilePath()
            );
            $position = strrpos($extensionRemoved, '/');
            if ($position !== false) {
                $shortCapitalCamelCaseName = substr($extensionRemoved, $position + 1);
            } else {
                $shortCapitalCamelCaseName = $extensionRemoved;
            }
            $this->short_capital_camel_case_name = $shortCapitalCamelCaseName;
        }

        return $this->short_capital_camel_case_name;
    }

    public function getSourceDirectoryPath(): string
    {
        if ($this->source_directory_path === null) {
            $fabricationFilePath = $this->getFabricationFile()->getFilePath();
            $sourceDirectoryPath = substr(
                $fabricationFilePath,
                0,
                strrpos(
                    $fabricationFilePath,
                    sprintf('/%s', $this->getShortCapitalCamelCaseName())
                )
            );
            $this->source_directory_path = $sourceDirectoryPath;
        }

        return $this->source_directory_path;
    }

    public function getFabricationDirectoryPath(): string
    {
        if ($this->fabrication_directory_path === null) {
            $fabricationDirectoryPath = str_replace(
                $this->getTargetApplication()->getSourceDirectoryPath(),
                $this->getTargetApplication()->getFabricationPath(),
                $this->getSourceDirectoryPath()
            );
            $this->fabrication_directory_path = $fabricationDirectoryPath;
        }

        return $this->fabrication_directory_path;
    }
}
