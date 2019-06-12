<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor;

use Neighborhoods\Bradfab\TemplateTree\ActorInterface;

interface RepositoryInterface
{
    public function add(ActorInterface $Actor): RepositoryInterface;

    public function getByIdentity(string $identity): ActorInterface;
}
