<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor\TemplateInterface;
use Neighborhoods\Bradfab\FabricationFileInterface;

interface AnnotationTokenizerInterface
{
    public const ANNOTATION_TAG = '@neighborhoods-bradfab:annotation-processor';
    public const ANNOTATION_REGEX = '/(?<=\/\*\*)(\s+' . self::ANNOTATION_TAG . ')(.*)([\s\S]*?)(?=\*\/)/';

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setActorTemplate(TemplateInterface $Template);

    public function tokenize(): AnnotationTokenizerInterface;

    public function getTokenizedContents(): string;
}
