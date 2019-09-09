<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor;

use Neighborhoods\BradfabTemplateTree\ActorInterface;

interface RepositoryInterface
{
    public function add(ActorInterface $Actor): RepositoryInterface;

    public function getByIdentity(string $identity): ActorInterface;
}
