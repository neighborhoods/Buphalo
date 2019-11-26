<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

use Neighborhoods\Buphalo\V1\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V1\ActorInterface;

interface ContextInterface
{
    public function setActor(ActorInterface $Actor);

    public function getActor(): ActorInterface;

    public function hasActor(): bool;

    public function setActorTemplate(TemplateInterface $Template);

    public function getActorTemplate(): TemplateInterface;

    public function hasActorTemplate(): bool;
}
