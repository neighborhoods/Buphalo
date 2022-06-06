<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorNameInterface;

interface RepositoryInterface
{
    public function add(PrimaryActorNameInterface $PrimaryActorName): RepositoryInterface;

    public function getByIdentity(string $identity): PrimaryActorNameInterface;
}
