<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

interface RepositoryInterface
{
    public function add(ActorInterface $Actor): RepositoryInterface;

    public function getByIdentity(string $identity): ActorInterface;
}
