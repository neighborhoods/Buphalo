<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template;

use Neighborhoods\Buphalo\V2\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V2\ActorInterface;

interface TokenizerInterface
{
    public const TOKEN_NAMESPACE_PREFIX = '**TOKEN_NAMESPACE_PREFIX**';
    public const TOKEN_NAMESPACE_RELATIVE = '**TOKEN_NAMESPACE_RELATIVE**';
    public const TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL = '**TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL**';
    public const TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL = '**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**';
    public const TOKEN_PARENT_ACTOR_NAME_FULL_PASCAL = '**TOKEN_PARENT_ACTOR_NAME_FULL_PASCAL**';
    public const TOKEN_PARENT_ACTOR_NAME_RELATIVE_PASCAL = '**TOKEN_PARENT_ACTOR_NAME_RELATIVE_PASCAL**';
    public const TOKEN_PARENT_ACTOR_NAME_SHORT_PASCAL = '**TOKEN_PARENT_ACTOR_NAME_SHORT_PASCAL**';
    public const TOKEN_PARENT_ACTOR_CLASS_PATH_RELATIVE = '**TOKEN_PARENT_ACTOR_CLASS_PATH_RELATIVE**';

    public function getTokenizedContents(): string;

    public function setActorTemplate(TemplateInterface $Template);

    public function getActor(): ActorInterface;

    public function setActorTemplateAnnotationTokenizer(AnnotationTokenizerInterface $AnnotationTokenizer);

    public function setActor(ActorInterface $Actor);
}
