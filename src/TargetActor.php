<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class TargetActor implements TargetActorInterface
{
    use FabricationFile\AwareTrait;
    use Fabricator\AwareTrait;

    protected $relative_name_path;
    protected $fqcn;
    protected $short_name;
    protected $name;

    public function getRelativeNamePath(): string
    {
        if ($this->relative_name_path === null) {
            $fabricationFilePath = $this->getFabricationFile()->getFilePath();
            $intermediary = str_replace(
                FabricationFileInterface::FILE_EXTENSION_FABRICATION,
                '',
                $fabricationFilePath
            );
            $relativeNamePath = str_replace(
                $this->getFabricator()->getSourcePath() . '/',
                '',
                $intermediary
            );
            $this->relative_name_path = $relativeNamePath;
        }

        return $this->relative_name_path;
    }

    public function getFQCN(): string
    {
        if ($this->fqcn === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $FQCN = $this->getFabricator()->getTargetNamespace() . $relativeNamePath;
            $FQCN = str_replace('/', '\\', $FQCN);
            $this->fqcn = $FQCN;
        }

        return $this->fqcn;
    }

    public function getShortName(): string
    {
        if ($this->short_name === null) {
            $relativeNamePath = $this->getRelativeNamePath();
            $start = 0;
            $position = strrpos($relativeNamePath, '/');
            if ($position !== false) {
                $start = $position + 1;
            }
            $this->short_name = trim(substr($relativeNamePath, $start));
        }

        return $this->short_name;
    }

    public function getName(): string
    {
        if ($this->name === null) {
            $this->name = str_replace('/', '', $this->getRelativeNamePath());
        }

        return $this->name;
    }
}
