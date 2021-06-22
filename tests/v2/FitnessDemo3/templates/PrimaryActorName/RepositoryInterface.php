<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\PrimaryActorName;

use Neighborhoods\BuphaloTemplateTree\PrimaryActorNameInterface;

interface RepositoryInterface
{
    public function add(PrimaryActorNameInterface $PrimaryActorName): RepositoryInterface;

    public function getByIdentity(string $identity): PrimaryActorNameInterface;
}
