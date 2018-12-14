<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor;

use Rhift\Bradfab\FabricationFile;
use Rhift\Bradfab\SupportingActor;

class Template implements TemplateInterface
{
    use FabricationFile\SupportingActor\AwareTrait;
    use SupportingActor\Template\Tokenizer\AwareTrait;
    use SupportingActor\Template\Compiler\AwareTrait;

    public function getContents(): string
    {

    }
}
