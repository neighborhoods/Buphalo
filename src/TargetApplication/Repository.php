<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TargetApplication;

use Neighborhoods\Buphalo\TargetApplication;
use Neighborhoods\Buphalo\TargetApplicationInterface;

class Repository implements RepositoryInterface
{
    use TargetApplication\Builder\Factory\AwareTrait;

    protected $TargetApplication;

    public function get(): TargetApplicationInterface
    {
        if ($this->TargetApplication === null) {
            $this->TargetApplication = $this->getTargetApplicationBuilderFactory()->create()->build();
        }

        return $this->TargetApplication;
    }
}
