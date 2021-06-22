<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\V2\Actor\Template\TokenizerInterface;
use Neighborhoods\Buphalo\V2\ActorInterface;
use Neighborhoods\Buphalo\V2\FabricationFile;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setActor(ActorInterface $Actor);

    public function build(): TokenizerInterface;

    public function setFabricationFile(FabricationFileInterface $getFabricationFile);
}
