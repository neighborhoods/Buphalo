<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use InvalidArgumentException;
use LogicException;
use Neighborhoods\Buphalo\V1\Fabricator\FactoryInterface;
use Neighborhoods\Buphalo\V1\Protean;
use ReflectionClass;

class Buphalo implements BuphaloInterface
{
    use Protean\Container\Builder\AwareTrait;

    protected const CAN_CACHE_CONTAINER = 'Neighborhoods_Buphalo_V1_Buphalo__CanCacheContainer';

    private $CanCacheContainerFromEnvironment;
    private $CanCacheContainer;

    public function run(): BuphaloInterface
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->getProteanContainerBuilder()->setCachedContainerFileName(
            sprintf(
                '%s.php',
                (new ReflectionClass($this))->getShortName()
            )
        );
        $this->getProteanContainerBuilder()->setCanBuildZendExpressive(false);
        $this->getProteanContainerBuilder()->setCanCacheContainer($this->getCanCacheContainer());
        $this->getProteanContainerBuilder()->registerServiceAsPublic(FactoryInterface::class);
        /** @var FabricatorInterface $fabricator */
        $fabricator = $this->getProteanContainerBuilder()->build()->get(FactoryInterface::class)->create();
        $fabricator->fabricate();

        return $this;
    }

    public function getCanCacheContainer(): bool
    {
        if ($this->CanCacheContainer === null) {
            $this->CanCacheContainer = $this->getCanCacheContainerFromEnvironment();
        }

        return $this->CanCacheContainer;
    }

    public function setCanCacheContainer(bool $CanCacheContainer): BuphaloInterface
    {
        if ($this->CanCacheContainer !== null) {
            throw new LogicException('Can Cache Container is already set.');
        }

        $this->CanCacheContainer = $CanCacheContainer;

        return $this;
    }

    protected function getCanCacheContainerFromEnvironment(): bool
    {
        if (isset($_ENV[self::CAN_CACHE_CONTAINER])) {
            if ($_ENV[self::CAN_CACHE_CONTAINER] === 'true' || $_ENV[self::CAN_CACHE_CONTAINER] === 'false') {
                $this->CanCacheContainerFromEnvironment = (bool)$_ENV[self::CAN_CACHE_CONTAINER];
            } else {
                throw new InvalidArgumentException(
                    sprintf('%s is not boolean. Given "%s"',
                        self::CAN_CACHE_CONTAINER,
                        $_ENV[self::CAN_CACHE_CONTAINER]
                    )
                );
            }
        } else {
            $this->CanCacheContainerFromEnvironment = false;
        }

        return $this->CanCacheContainerFromEnvironment;
    }
}
