<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Context;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\ContextInterface;
use Neighborhoods\Buphalo\V1\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V1\ActorInterface;

interface BuilderInterface
{
    public function build(): ContextInterface;

    public function setActor(ActorInterface $Actor);

    public function setActorTemplate(TemplateInterface $Template);
}
