<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\RuleInterface;
use Neighborhoods\Buphalo\V1\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V1\ActorInterface;

interface BuilderInterface
{
    /** @noinspection ReturnTypeCanBeDeclaredInspection */
    /** @return RuleInterface */
    public function build();

    public function setRuleDefinition(array $ruleDefinition);

    public function setTemplateContents(string $TemplateContents);

    public function setActor(ActorInterface $Actor);

    public function setActorTemplate(TemplateInterface $Template);
}
