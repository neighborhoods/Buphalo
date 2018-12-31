<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template;

use Neighborhoods\Bradfab\TargetActor\TemplateInterface;

interface TokenizerInterface
{
    public const VARIABLE_TOKEN = '**VARIABLE_TOKEN**';
    public const PROPERTY_REFERENCE_TOKEN = '**PROPERTY_REFERENCE_TOKEN**';
    public const FQCN_TOKEN = '**FQCN_TOKEN**';
    public const PROPERTY_TOKEN = '**PROPERTY_TOKEN**';
    public const TRAIT_TOKEN = '**TRAIT_TOKEN**';
    public const METHOD_AND_COMMENT_TOKEN = '**METHOD_AND_COMMENT_TOKEN**';
    public const INTERFACE_TOKEN = '**INTERFACE_TOKEN**';

    public function getTokenizedContents(): string;

    public function setTargetActorTemplate(TemplateInterface $Template);

    public function getTargetActorTemplate(): TemplateInterface;
}