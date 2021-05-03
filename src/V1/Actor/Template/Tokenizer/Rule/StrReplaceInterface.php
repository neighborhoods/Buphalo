<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\RuleInterface;

interface StrReplaceInterface extends RuleInterface
{
    public function setTemplateContents(string $TemplateContents): StrReplaceInterface;

    public function setSearch(string $Search): StrReplaceInterface;

    public function setReplace(string $Replace): StrReplaceInterface;

    public function setFileExtensionAffinity(string $FileExtensionAffinity): StrReplaceInterface;
}
