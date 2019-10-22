<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\V1\Actor\Template\TokenizerInterface;
use Neighborhoods\Buphalo\V1\ActorInterface;
use Neighborhoods\Buphalo\V1\FabricationFile;
use Neighborhoods\Buphalo\V1\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setActor(ActorInterface $Actor);

    public function build(): TokenizerInterface;

    public function setFabricationFile(FabricationFileInterface $getFabricationFile);
}
