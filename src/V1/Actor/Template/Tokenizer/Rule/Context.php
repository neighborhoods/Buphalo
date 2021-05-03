<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

use Neighborhoods\Buphalo\V1;

class Context implements ContextInterface
{
    use V1\Actor\AwareTrait {
        getActor as public;
        hasActor as public;
    }

    use V1\Actor\Template\AwareTrait {
        getActorTemplate as public;
        hasActorTemplate as public;
    }
}
