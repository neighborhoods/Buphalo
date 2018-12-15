<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor;

use Rhift\Bradfab\FabricationFile\SupportingActorInterface;
use Rhift\Bradfab\StringMap;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use StringMap\Factory\AwareTrait;

    protected $record;

    public function build(): SupportingActorInterface
    {
        $record = $this->getRecord();
        $supportingActor = $this->getFabricationFileSupportingActorFactory()->create();
        $supportingActor->setRelativeClassName($record['relative_class_name']);
        $awareMap = $this->getStringMapFactory()->create();
        if (isset($record[self::AWARE_OF]) && is_array($record[self::AWARE_OF])) {
            foreach ($record[self::AWARE_OF] as $aware) {
                $awareMap[$aware] = $aware;
            }
            $supportingActor->setAwareOf($awareMap);
        }

        return $supportingActor;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new \LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new \LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
