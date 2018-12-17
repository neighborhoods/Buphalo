<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

interface TargetApplicationInterface
{

    public function getFqcn();

    public function setFqcn($fqcn): TargetApplicationInterface;

    public function setSourcePath($source_path): TargetApplicationInterface;

    public function getSourcePath();

    public function setFabricationPath($fabrication_path): TargetApplicationInterface;

    public function getFabricationPath();
}
