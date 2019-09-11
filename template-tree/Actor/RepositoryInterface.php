<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\Actor;

use Neighborhoods\BuphaloTemplateTree\ActorInterface;

interface RepositoryInterface
{
    public function add(ActorInterface $Actor): RepositoryInterface;

    public function getByIdentity(string $identity): ActorInterface;
}
