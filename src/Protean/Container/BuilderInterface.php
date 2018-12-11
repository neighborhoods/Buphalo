<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Protean\Container;

use Psr\Container\ContainerInterface;

interface BuilderInterface
{
    public function build(): ContainerInterface;

    public function registerServiceAsPublic(string $serviceId): BuilderInterface;

    public function setBuildZendExpressive(bool $build_zend_expressive): BuilderInterface;
}
