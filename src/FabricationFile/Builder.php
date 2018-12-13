<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\FabricationFileInterface;
use Rhift\Bradfab\FabricationFile;
use Symfony\Component\Finder\SplFileInfo;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\SupportingActor\Map\Builder\Factory\AwareTrait;

    protected $spl_file_info;

    public function build(): FabricationFileInterface
    {
        $FabricationFile = $this->getFabricationFileFactory()->create();
        $supportingActorMapBuilder = $this->getSupportingActorMapBuilderFactory()->create();
        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');

        return $actor;
    }

    protected function getSPLFileInfo(): SplFileInfo
    {
        if ($this->spl_file_info === null) {
            throw new \LogicException('Builder spl_file_info has not been set.');
        }

        return $this->spl_file_info;
    }

    public function setSplFileInfo(SplFileInfo $spl_file_info): BuilderInterface
    {
        if ($this->spl_file_info !== null) {
            throw new \LogicException('Builder spl_file_info is already set.');
        }

        $this->spl_file_info = $spl_file_info;

        return $this;
    }
}
