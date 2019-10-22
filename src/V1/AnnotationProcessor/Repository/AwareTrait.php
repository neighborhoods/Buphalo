<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Repository;

use LogicException;
use Neighborhoods\Buphalo\V1\AnnotationProcessor\RepositoryInterface;

trait AwareTrait
{
    protected $AnnotationProcessorRepository;

    public function setAnnotationProcessorRepository(RepositoryInterface $AnnotationProcessorRepository): self
    {
        if ($this->hasAnnotationProcessorRepository()) {
            throw new LogicException('AnnotationProcessorRepository is already set.');
        }
        $this->AnnotationProcessorRepository = $AnnotationProcessorRepository;

        return $this;
    }

    protected function getAnnotationProcessorRepository(): RepositoryInterface
    {
        if (!$this->hasAnnotationProcessorRepository()) {
            throw new LogicException('AnnotationProcessorRepository is not set.');
        }

        return $this->AnnotationProcessorRepository;
    }

    protected function hasAnnotationProcessorRepository(): bool
    {
        return isset($this->AnnotationProcessorRepository);
    }

    protected function unsetAnnotationProcessorRepository(): self
    {
        if (!$this->hasAnnotationProcessorRepository()) {
            throw new LogicException('AnnotationProcessorRepository is not set.');
        }
        unset($this->AnnotationProcessorRepository);

        return $this;
    }
}
