<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template;

use Neighborhoods\Buphalo\V2\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V2\ActorInterface;

interface TokenizerInterface
{
    public const NAMESPACE_PREFIX_TOKEN = '**NAMESPACE_PREFIX_TOKEN**';
    public const RELATIVE_CLASS_PATH_TOKEN = '**RELATIVE_CLASS_PATH_TOKEN**';
    public const SHORT_PASCAL_CASE_NAME_TOKEN = '**SHORT_PASCAL_CASE_NAME_TOKEN**';
    public const FULL_PASCAL_CASE_NAME_TOKEN = '**FULL_PASCAL_CASE_NAME_TOKEN**';
    public const NAMESPACE_RELATIVE_TOKEN = '**NAMESPACE_RELATIVE_TOKEN**';
    public const PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN = '**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**';
    public const PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN = '**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**';
    public const EMPTY_TOKEN = '**EMPTY_TOKEN**';

    public function getTokenizedContents(): string;

    public function setActorTemplate(TemplateInterface $Template);

    public function getActor(): ActorInterface;

    public function setActorTemplateAnnotationTokenizer(AnnotationTokenizerInterface $AnnotationTokenizer);

    public function setActor(ActorInterface $Actor);
}
