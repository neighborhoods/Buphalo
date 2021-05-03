<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\RuleInterface;

interface PregReplaceInterface extends RuleInterface
{
    public function getFileExtensionAffinity(): string;

    public function getTokenizedContents(): string;

    public function setFileExtensionAffinity(string $FileExtensionAffinity): PregReplaceInterface;

    public function setPattern(string $Pattern): PregReplaceInterface;

    public function setTemplateContents(string $TemplateContents): PregReplaceInterface;

    public function setReplacement(string $Replacement): PregReplaceInterface;
}
