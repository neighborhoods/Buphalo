<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor\TemplateInterface;

interface AnnotationTokenizerInterface
{
    public const ANNOTATION_TAG = '@rhift-bradfab:annotation-processor';
    public const ANNOTATION_REGEX = '/(?<=\/\*\*)(\s+' . self::ANNOTATION_TAG . ')(.*)([\s\S]*?)(?=\*\/)/';

    public function setSupportingActorTemplate(TemplateInterface $Template);

    public function tokenize(): AnnotationTokenizerInterface;

    public function getTokenizedContents(): string;
}
