<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
