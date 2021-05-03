<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

use LogicException;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Neighborhoods\Buphalo\V1;

class PregReplace implements PregReplaceInterface
{
    use V1\Actor\Template\Tokenizer\Rule\Context\AwareTrait;

    private $Pattern;
    private $Replacement;
    private $TemplateContents;
    private $FileExtensionAffinity;

    public function getTokenizedContents(): string
    {
        $expressionLanguage = new ExpressionLanguage();
        $expressionLanguage->addFunction(ExpressionFunction::fromPhp('sprintf'));
        $pattern = $expressionLanguage->evaluate($this->getPattern());
        $replacement = $expressionLanguage->evaluate($this->getReplacement());
        $tokenizedContents = preg_replace(
            $pattern,
            $replacement,
            $this->getTemplateContents()
        );

        return $tokenizedContents;
    }

    private function getPattern(): string
    {
        if ($this->Pattern === null) {
            throw new LogicException('Pattern has not been set.');
        }

        return $this->Pattern;
    }

    public function setPattern(string $Pattern): PregReplaceInterface
    {
        if ($this->Pattern !== null) {
            throw new LogicException('Pattern is already set.');
        }
        $this->Pattern = $Pattern;

        return $this;
    }

    private function getReplacement(): string
    {
        if ($this->Replacement === null) {
            throw new LogicException('Replacement has not been set.');
        }

        return $this->Replacement;
    }

    public function setReplacement(string $Replacement): PregReplaceInterface
    {
        if ($this->Replacement !== null) {
            throw new LogicException('Replacement is already set.');
        }

        $this->Replacement = $Replacement;

        return $this;
    }

    private function getTemplateContents(): string
    {
        if ($this->TemplateContents === null) {
            throw new LogicException('Template Contents has not been set.');
        }

        return $this->TemplateContents;
    }

    public function setTemplateContents(string $TemplateContents): PregReplaceInterface
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

    public function setFileExtensionAffinity(string $FileExtensionAffinity): PregReplaceInterface
    {
        if ($this->FileExtensionAffinity !== null) {
            throw new LogicException('File Extension Affinity is already set.');
        }

        $this->FileExtensionAffinity = $FileExtensionAffinity;

        return $this;
    }
}
