<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor\TemplateInterface;
use Neighborhoods\Bradfab\ActorInterface;

interface TokenizerInterface
{
    public const NAMESPACE_TOKEN = '**NAMESPACE_TOKEN**';
    public const RELATIVE_CLASS_PATH_TOKEN = '**RELATIVE_CLASS_PATH_TOKEN**';
    public const SHORT_PASCAL_CASE_NAME_TOKEN = '**SHORT_PASCAL_CASE_NAME_TOKEN**';
    public const FULL_PASCAL_CASE_NAME_TOKEN = '**FULL_PASCAL_CASE_NAME_TOKEN**';

    public function getTokenizedContents(): string;

    public function setActorTemplate(TemplateInterface $Template);

    public function getActor(): ActorInterface;

    public function setActorTemplateAnnotationTokenizer(AnnotationTokenizerInterface $AnnotationTokenizer);

    public function setActor(ActorInterface $Actor);
}
