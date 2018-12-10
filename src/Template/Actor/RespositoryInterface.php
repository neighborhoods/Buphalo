<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

interface RepositoryInterface
{
    public function get(AskInterface $ask): MapInterface;
}
