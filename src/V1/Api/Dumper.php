<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml;
use Symfony\Component\Serializer;

class Dumper implements DumperInterface
{
    private const DUMP_FORMAT = Serializer\Encoder\YamlEncoder::FORMAT;
    private const YAML_INDENTATION = 2;

    /** @var Serializer\Serializer */
    private $serializer;

    /** @var Filesystem */
    private $filesystem;

    public function __construct()
    {
        // If using PHP 7.4+ style setters, we could specify an ObjectNormalizer here
        // This would allow us to pass `AbstractOjbectNormalizer::SKIP_NULL_VALUES = true` below.
        // However, that Normalizer actually detects and uses getters, but doesn't know about hassers,
        // as such, our 7.2 style getters throw an exception.
        $normalizers = [
            // This lets us take advantage of every object's jsonSerialize() method
            new Serializer\Normalizer\JsonSerializableNormalizer(),
        ];

        $encoders = [
            new Serializer\Encoder\YamlEncoder(
                new Yaml\Dumper(self::YAML_INDENTATION) // This is per-level indentation
            ),
        ];

        $serializer = new Serializer\Serializer($normalizers, $encoders);

        $this->setSerializer($serializer);

        $this->setFilesystem(new Filesystem());
    }

    public function dump(FabricationFileInterface $fabricationFile, string $filePath): Dumper
    {
        $output = $this->getSerializer()->serialize(
            $fabricationFile,
            self::DUMP_FORMAT,
            [
                'yaml_inline' => PHP_INT_MAX,
                'yaml_indent' => 0, // This is whole-file indentation
                'yaml_flags' => 0,
            ]
        );

        // This is the alternative to using the JsonSerializer
        //$output = Yaml\Yaml::dump(\json_decode(\json_encode($fabricationFile), true), PHP_INT_MAX, 2);

        $this->getFilesystem()->dumpFile($filePath, $output);

        return $this;
    }

    private function setSerializer(Serializer\Serializer $serializer): void
    {
        $this->serializer = $serializer;
    }

    private function getSerializer(): Serializer\Serializer
    {
        if ($this->serializer === null) {
            throw new \LogicException('Dumper serializer has not been set.');
        }

        return $this->serializer;
    }

    public function setFilesystem(Filesystem $filesystem): void
    {
        $this->filesystem = $filesystem;
    }

    private function getFilesystem(): Filesystem
    {
        if ($this->filesystem === null) {
            throw new \LogicException('Dumper filesystem has not been set.');
        }

        return $this->filesystem;
    }
}
