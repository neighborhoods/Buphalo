<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

interface RepositoryInterface
{
    public function add(AskInterface $ask): RepositoryInterface;

    public function exists(AskInterface $ask): bool;

    public function get(AskInterface $ask): ActorInterface;

    public function replace(AskInterface $ask): RepositoryInterface;

    public function remove(AskInterface $ask): RepositoryInterface;

    public function startTransaction(): RepositoryInterface;

    public function commit(): RepositoryInterface;

    public function rollback(): RepositoryInterface;
}
