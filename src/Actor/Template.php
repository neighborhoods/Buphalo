<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use LogicException;
use Neighborhoods\Bradfab\Actor;
use Neighborhoods\Bradfab\FabricationFile;
use Neighborhoods\Bradfab\TemplateTree;

class Template implements TemplateInterface
{
    use Actor\AwareTrait;
    use TemplateTree\Map\AwareTrait;
    use FabricationFile\Actor\AwareTrait {
        getFabricationFileActor as public;
    }

    protected $Contents;
    protected $TokenizedContents;
    protected $CompiledContents;
    protected $FilePath;

    public function getContents(): string
    {
        if ($this->Contents === null) {
            $this->Contents = file_get_contents($this->getFilePath());
        }

        return $this->Contents;
    }

    public function applyTokenizedContents(string $tokenizedContents): TemplateInterface
    {
        $this->TokenizedContents = $tokenizedContents;

        return $this;
    }

    public function getTokenizedContents()
    {
        if ($this->TokenizedContents === null) {
            throw new LogicException('Tokenized Contents has not been set.');
        }

        return $this->TokenizedContents;
    }

    public function getCompiledContents(): string
    {
        if ($this->CompiledContents === null) {
            throw new LogicException('Compiled Contents has not been set.');
        }

        return $this->CompiledContents;
    }

    public function applyCompiledContents(string $CompiledContents): TemplateInterface
    {
        $this->CompiledContents = $CompiledContents;

        return $this;
    }

    public function getFilePath()
    {
        if ($this->FilePath === null) {
            throw new LogicException('File Path has not been set.');
        }

        return $this->FilePath;
    }

    public function setFilePath($FilePath): TemplateInterface
    {
        if ($this->FilePath !== null) {
            throw new LogicException('File Path is already set.');
        }

        $this->FilePath = $FilePath;

        return $this;
    }
}
