<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

use LogicException;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Neighborhoods\Buphalo\V1;

class StrReplace implements StrReplaceInterface
{
    use V1\Actor\Template\Tokenizer\Rule\Context\AwareTrait;

    private $Search;
    private $Replace;
    private $TemplateContents;
    private $FileExtensionAffinity;

    public function getTokenizedContents(): string
    {
        $expressionLanguage = new ExpressionLanguage();
        $expressionLanguage->addFunction(ExpressionFunction::fromPhp('sprintf'));
        $search = $expressionLanguage->evaluate($this->getSearch());
        $replace = $expressionLanguage->evaluate($this->getReplace());
        $tokenizedContents = str_replace(
            $search,
            $replace,
            $this->getTemplateContents()
        );

        return $tokenizedContents;
    }

    private function getSearch(): string
    {
        if ($this->Search === null) {
            throw new LogicException('Search has not been set.');
        }

        return $this->Search;
    }

    public function setSearch(string $Search): StrReplaceInterface
    {
        if ($this->Search !== null) {
            throw new LogicException('Search is already set.');
        }
        $this->Search = $Search;

        return $this;
    }

    private function getReplace(): string
    {
        if ($this->Replace === null) {
            throw new LogicException('Replace has not been set.');
        }

        return $this->Replace;
    }

    public function setReplace(string $Replace): StrReplaceInterface
    {
        if ($this->Replace !== null) {
            throw new LogicException('Replace is already set.');
        }

        $this->Replace = $Replace;

        return $this;
    }

    private function getTemplateContents(): string
    {
        if ($this->TemplateContents === null) {
            throw new LogicException('Template Contents has not been set.');
        }

        return $this->TemplateContents;
    }

    public function setTemplateContents(string $TemplateContents): StrReplaceInterface
    {
        if ($this->TemplateContents !== null) {
            throw new LogicException('Template Contents is already set.');
        }

        $this->TemplateContents = $TemplateContents;

        return $this;
    }

    public function getFileExtensionAffinity(): string
    {
        if ($this->FileExtensionAffinity === null) {
            throw new LogicException('File Extension Affinity has not been set.');
        }

        return $this->FileExtensionAffinity;
    }

    public function setFileExtensionAffinity(string $FileExtensionAffinity): StrReplaceInterface
    {
        if ($this->FileExtensionAffinity !== null) {
            throw new LogicException('File Extension Affinity is already set.');
        }

        $this->FileExtensionAffinity = $FileExtensionAffinity;

        return $this;
    }
}
