<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template;

use Neighborhoods\Bradfab\SupportingActor\TemplateInterface;

interface AnnotationTokenizerInterface
{
    public const ANNOTATION_TAG = '@neighborhoods-bradfab:annotation-processor';
    public const ANNOTATION_REGEX = '(?<=\/\*\*)(\s+' . self::ANNOTATION_TAG . '\s+)([\s\S]*?)(?=\*\/)/';

    public function setSupportingActorTemplate(TemplateInterface $Template);

    public function tokenize(): AnnotationTokenizerInterface;

    public function getTokenizedContents(): string;
}
