<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\Actor\Template\TokenizerInterface;
use Neighborhoods\Buphalo\ActorInterface;
use Neighborhoods\Buphalo\FabricationFile;
use Neighborhoods\Buphalo\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setActor(ActorInterface $Actor);

    public function build(): TokenizerInterface;

    public function setFabricationFile(FabricationFileInterface $getFabricationFile);
}
