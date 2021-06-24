<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Phar;

use LogicException;

class SearchReplacement implements SearchReplacementInterface
{
    /** @var string */
    private $search;

    /** @var string */
    private $replacement;

    public function getSearch(): string
    {
        if ($this->search === null) {
            throw new LogicException('Replacement pattern has not been set.');
        }

        return $this->search;
    }

    public function setSearch(string $search): SearchReplacementInterface
    {
        if ($this->search !== null) {
            throw new LogicException('Replacement pattern is already set.');
        }

        $this->search = $search;

        return $this;
    }

    public function getReplacement(): string
    {
        if ($this->replacement === null) {
            throw new LogicException('Replacement replacement has not been set.');
        }

        return $this->replacement;
    }

    public function setReplacement(string $replacement): SearchReplacementInterface
    {
        if ($this->replacement !== null) {
            throw new LogicException('Replacement replacement is already set.');
        }

        $this->replacement = $replacement;

        return $this;
    }
}
