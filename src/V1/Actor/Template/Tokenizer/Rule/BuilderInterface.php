<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\RuleInterface;
use Neighborhoods\Buphalo\V1\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V1\ActorInterface;

interface BuilderInterface
{
    public const OPTION_FILE_EXTENSION_AFFINITY = 'file.extension.affinity';

    public function build(): RuleInterface;

    public function setOptions(array $options);

    public function setTemplateContents(string $TemplateContents);

    public function setActor(ActorInterface $Actor);

    public function setActorTemplate(TemplateInterface $Template);

    public function getOptions(): array;
}
