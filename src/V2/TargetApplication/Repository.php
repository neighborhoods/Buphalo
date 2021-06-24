<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TargetApplication;

use Neighborhoods\Buphalo\V2\TargetApplication;
use Neighborhoods\Buphalo\V2\TargetApplicationInterface;

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
