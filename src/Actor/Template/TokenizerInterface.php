<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor\TemplateInterface;
use Neighborhoods\Bradfab\ActorInterface;

interface TokenizerInterface
{
    public const PRIMARY_ACTOR_VARIABLE_TOKEN = '**PRIMARY_ACTOR_VARIABLE_TOKEN**';
    public const PRIMARY_ACTOR_PROPERTY_REFERENCE_TOKEN = '**PRIMARY_ACTOR_PROPERTY_REFERENCE_TOKEN**';
    public const PRIMARY_ACTOR_NAMESPACE_TOKEN = '**PRIMARY_ACTOR_NAMESPACE_TOKEN**';
    public const PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN = '**PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN**';
    public const PRIMARY_ACTOR_PROPERTY_TOKEN = '**PRIMARY_ACTOR_PROPERTY_TOKEN**';
    public const PRIMARY_ACTOR_TRAIT_TOKEN = '**PRIMARY_ACTOR_TRAIT_TOKEN**';
    public const PRIMARY_ACTOR_FULL_NAME_TOKEN = '**PRIMARY_ACTOR_FULL_NAME_TOKEN**';
    public const PRIMARY_ACTOR_INTERFACE_TOKEN = '**PRIMARY_ACTOR_INTERFACE_TOKEN**';
    public const PRIMARY_ACTOR_SHORT_NAME_TOKEN = '**PRIMARY_ACTOR_SHORT_NAME_TOKEN**';
    public const ACTOR_SHORT_NAME_TOKEN = '**ACTOR_SHORT_NAME_TOKEN**';

    public function getTokenizedContents(): string;

    public function setActorTemplate(TemplateInterface $Template);

    public function getActor(): ActorInterface;

    public function setActorTemplateAnnotationTokenizer(AnnotationTokenizerInterface $AnnotationTokenizer);

    public function setActor(ActorInterface $Actor);
}
