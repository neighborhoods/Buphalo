<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor;

use Rhift\Bradfab\FabricationFile;

class Context implements ContextInterface
{
    use FabricationFile\AwareTrait {
        getFabricationFile as public;
    }
}
