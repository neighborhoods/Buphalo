<?php
/** @noinspection PhpUndefinedNamespaceInspection */ // TODO: Fix Container (BUPH-95)
/** @noinspection PhpUndefinedClassInspection */
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Protean\Container;

use LogicException;
use Neighborhoods\Buphalo\V1\Symfony\Component\DependencyInjection\ContainerBuilder\Facade;
use ProjectServiceContainer;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Dumper\YamlDumper;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use UnexpectedValueException;
use Zend\Expressive\Application;

class Builder implements BuilderInterface
{
    protected $container;
    protected $applicationRootDirectoryPath;
    protected $symfonyContainerBuilder;
    protected $serviceIdsRegisteredForPublicAccess = [];
    protected $can_build_zend_expressive;
    protected $can_cache_container;
    protected $cached_container_file_name;
    protected $filesystem;

    public function build(): ContainerInterface
    {
        return $this->getContainer();
    }

    protected function getContainer(): ContainerInterface
    {
        if ($this->container === null) {
            $containerCacheFilePath = $this->getSymfonyContainerFilePath();
            if (file_exists($containerCacheFilePath)) {
                /** @noinspection PhpIncludeInspection */
                require_once $containerCacheFilePath;
                /** @noinspection PhpUndefinedClassInspection */
                $containerBuilder = new ProjectServiceContainer();
            } else {
                if ($this->getCanBuildZendExpressive()) {
                    $this->buildZendExpressive();
                }
                if ($this->getCanCacheContainer()) {
                    $this->cacheSymfonyContainerBuilder();
                }
                $containerBuilder = $this->getSymfonyContainerBuilder();
            }
            $this->container = $containerBuilder;
        }

        return $this->container;
    }

    public function setCanBuildZendExpressive(bool $can_build_zend_expressive): BuilderInterface
    {
        if ($this->can_build_zend_expressive === null) {
            $this->can_build_zend_expressive = $can_build_zend_expressive;
        } else {
            throw new LogicException('Builder can_build_zend_expressive is already set.');
        }

        return $this;
    }

    protected function getCanBuildZendExpressive(): bool
    {
        if ($this->can_build_zend_expressive === null) {
            throw new LogicException('Builder can_build_zend_expressive is not set.');
        }

        return $this->can_build_zend_expressive;
    }

    protected function getSymfonyContainerBuilder(): ContainerBuilder
    {
        if ($this->symfonyContainerBuilder === null) {
            $containerBuilder = new ContainerBuilder();
            $discoverableDirectories[] = $this->getCacheDirectoryPath();
            $discoverableDirectories[] = $this->getFabricationDirectoryPath();
            $discoverableDirectories[] = $this->getSourceDirectoryPath();
            $containerBuilderFacade = (new Facade())->setContainerBuilder($containerBuilder);
            $containerBuilderFacade->addFinder(
                (new Finder())->name('*.service.yml')->files()->in($discoverableDirectories)
            );
            $containerBuilderFacade->assembleYaml();
            $this->updateServiceDefinitions($containerBuilder);
            $containerBuilderFacade->build();
            $this->symfonyContainerBuilder = $containerBuilder;
        }

        return $this->symfonyContainerBuilder;
    }

    protected function cacheSymfonyContainerBuilder(): BuilderInterface
    {
        $containerBuilder = $this->getSymfonyContainerBuilder();
        file_put_contents($this->getSymfonyContainerFilePath(), (new PhpDumper($containerBuilder))->dump());

        return $this;
    }

    protected function getCanCacheContainer(): bool
    {
        if ($this->can_cache_container === null) {
            throw new LogicException('Builder can_cache_container has not been set.');
        }

        return $this->can_cache_container;
    }

    public function setCanCacheContainer(bool $can_cache_container): BuilderInterface
    {
        if ($this->can_cache_container !== null) {
            throw new LogicException('Builder can_cache_container is already set.');
        }

        $this->can_cache_container = $can_cache_container;

        return $this;
    }

    protected function buildZendExpressive(): BuilderInterface
    {
        $currentWorkingDirectory = getcwd();
        chdir($this->getApplicationRootDirectoryPath());
        /** @noinspection PhpIncludeInspection */
        /** @noinspection UsingInclusionReturnValueInspection */
        $zendContainerBuilder = require $this->getZendConfigContainerFilePath();
        $applicationServiceDefinition = $zendContainerBuilder->findDefinition(Application::class);
        /** @noinspection PhpIncludeInspection */
        /** @noinspection UsingInclusionReturnValueInspection */
        (require $this->getPipelineFilePath())($applicationServiceDefinition);
        file_put_contents($this->getExpressiveDIYAMLFilePath(), (new YamlDumper($zendContainerBuilder))->dump());
        chdir($currentWorkingDirectory);

        return $this;
    }

    protected function getFabricationDirectoryPath(): string
    {
        if (!$this->realpath($this->getApplicationRootDirectoryPath() . '/fab/V1')) {
            $this->getFilesystem()->mkdir($this->getApplicationRootDirectoryPath() . '/fab/V1');
        }

        return $this->realpath($this->getApplicationRootDirectoryPath() . '/fab/V1');
    }

    protected function getSourceDirectoryPath(): string
    {
        return $this->realpath($this->getApplicationRootDirectoryPath() . '/src/V1');
    }

    protected function getCacheDirectoryPath(): string
    {
        if (!$this->realpath($this->getApplicationRootDirectoryPath() . '/data/cache/V1')) {
            $this->getFilesystem()->mkdir($this->getApplicationRootDirectoryPath() . '/data/cache/V1');
        }

        return $this->realpath($this->getApplicationRootDirectoryPath() . '/data/cache/V1');
    }

    protected function getPipelineFilePath(): string
    {
        return $this->getConfigurationDirectoryPath() . '/pipeline.php';
    }

    protected function getZendConfigContainerFilePath(): string
    {
        return $this->getConfigurationDirectoryPath() . '/container.php';
    }

    protected function getConfigurationDirectoryPath(): string
    {
        if (!$this->realpath($this->getApplicationRootDirectoryPath() . '/config')) {
            $this->getFilesystem()->mkdir($this->getApplicationRootDirectoryPath() . '/config');
        }

        return $this->realpath($this->getApplicationRootDirectoryPath() . '/config');
    }

    protected function getExpressiveDIYAMLFilePath(): string
    {
        return $this->getCacheDirectoryPath() . '/expressive.yml';
    }

    protected function getSymfonyContainerFilePath(): string
    {
        $symfonyContainerFilePath = sprintf(
            '%s/%s',
            $this->getCacheDirectoryPath(),
            $this->getCachedContainerFileName()
        );

        return $symfonyContainerFilePath;
    }

    public function setApplicationRootDirectoryPath(string $applicationRootDirectoryPath): BuilderInterface
    {
        if ($this->applicationRootDirectoryPath === null) {
            /** @noinspection CallableParameterUseCaseInTypeContextInspection */
            $applicationRootDirectoryPath = $this->realpath(rtrim($applicationRootDirectoryPath, '/'));
            if (is_dir($applicationRootDirectoryPath)) {
                $this->applicationRootDirectoryPath = $applicationRootDirectoryPath;
            } else {
                $message = sprintf(
                    'Application root directory path[%s] is not a directory.',
                    $applicationRootDirectoryPath
                );
                throw new UnexpectedValueException($message);
            }
        } else {
            throw new LogicException('Application root directory path is already set.');
        }

        return $this;
    }

    protected function getApplicationRootDirectoryPath(): string
    {
        if ($this->applicationRootDirectoryPath === null) {
            throw new LogicException('Application root directory path is not set.');
        }

        return $this->applicationRootDirectoryPath;
    }

    public function registerServiceAsPublic(string $serviceId): BuilderInterface
    {
        if (isset($this->serviceIdsRegisteredForPublicAccess[$serviceId])) {
            throw new LogicException(
                sprintf('Service ID[%s] is already registered for public access.', $serviceId)
            );
        }
        $this->serviceIdsRegisteredForPublicAccess[$serviceId] = $serviceId;

        return $this;
    }

    protected function getServiceIdsRegisteredForPublicAccess(): array
    {
        return $this->serviceIdsRegisteredForPublicAccess;
    }

    protected function updateServiceDefinitions(ContainerBuilder $containerBuilder): BuilderInterface
    {
        foreach ($this->getServiceIdsRegisteredForPublicAccess() as $serviceId) {
            $containerBuilder->getDefinition($serviceId)->setPublic(true);
        }

        return $this;
    }

    protected function getCachedContainerFileName(): string
    {
        if ($this->cached_container_file_name === null) {
            throw new LogicException('Builder cached_container_file_name has not been set.');
        }

        return $this->cached_container_file_name;
    }

    public function setCachedContainerFileName(string $cached_container_file_name): BuilderInterface
    {
        if ($this->cached_container_file_name !== null) {
            throw new LogicException('Builder cached_container_file_name is already set.');
        }

        $this->cached_container_file_name = $cached_container_file_name;

        return $this;
    }

    protected function getFilesystem(): Filesystem
    {
        if ($this->filesystem === null) {
            $this->filesystem = new Filesystem();
        }

        return $this->filesystem;
    }

    /**
     * Hacky version of realpath for use inside a Phar. May not cover all cases.
     *
     * @param string $path
     * @return string|false
     */
    private function realpath(string $path)
    {
        $pathInfo = pathinfo($path);
        $realpath = $pathInfo['dirname'] . DIRECTORY_SEPARATOR . $pathInfo['basename'];
        if ($this->getFilesystem()->exists($realpath)) {
            return $realpath;
        }

        return false;
    }
}
