<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor\TemplateInterface;

interface AnnotationTokenizerInterface
{
    public const ANNOTATION_REGEX = '/(?<=\/\*\*)(\s+@rhift-bradfab:annotation-processor)(.*)([\s\S]*?)(?=\*\/)/';

    public function setSupportingActorTemplate(TemplateInterface $Template);

    public function tokenize(): AnnotationTokenizerInterface;

    public function getTokenizedContents(): string;
}
