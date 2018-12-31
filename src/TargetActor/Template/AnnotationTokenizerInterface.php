<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template;

use Neighborhoods\Bradfab\TargetActor\TemplateInterface;

interface AnnotationTokenizerInterface
{
    public const ANNOTATION_TAG = '@neighborhoods-bradfab:annotation-processor';
    public const ANNOTATION_REGEX = '/(?<=\/\*\*)(\s+' . self::ANNOTATION_TAG . ')(.*)([\s\S]*?)(?=\*\/)/';

    public function setTargetActorTemplate(TemplateInterface $Template);

    public function tokenize(): AnnotationTokenizerInterface;

    public function getTokenizedContents(): string;
}
