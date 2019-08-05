<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Tokenizer;

use Neighborhoods\Bradfab\Actor\Template\TokenizerInterface;
use Neighborhoods\Bradfab\ActorInterface;
use Neighborhoods\Bradfab\FabricationFile;
use Neighborhoods\Bradfab\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setActor(ActorInterface $Actor);

    public function build(): TokenizerInterface;

    public function setFabricationFile(FabricationFileInterface $getFabricationFile);
}
