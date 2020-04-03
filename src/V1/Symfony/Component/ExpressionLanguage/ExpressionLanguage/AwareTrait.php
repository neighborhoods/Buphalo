<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Symfony\Component\ExpressionLanguage\ExpressionLanguage;

use LogicException;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

trait AwareTrait
{
    protected $expressionLanguage;

    public function setExpressionLanguage(ExpressionLanguage $ExpressionLanguage): self
    {
        if ($this->hasExpressionLanguage()) {
            throw new LogicException('ExpressionLanguage is already set.');
        }
        $this->expressionLanguage = $ExpressionLanguage;

        return $this;
    }

    protected function getExpressionLanguage(): ExpressionLanguage
    {
        if (!$this->hasExpressionLanguage()) {
            throw new LogicException('ExpressionLanguage is not set.');
        }

        return $this->expressionLanguage;
    }

    protected function hasExpressionLanguage(): bool
    {
        return isset($this->expressionLanguage);
    }

    protected function unsetExpressionLanguage(): self
    {
        if (!$this->hasExpressionLanguage()) {
            throw new LogicException('ExpressionLanguage is not set.');
        }
        unset($this->expressionLanguage);

        return $this;
    }
}
