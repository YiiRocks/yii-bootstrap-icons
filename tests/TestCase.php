<?php

declare(strict_types=1);

namespace YiiRocks\Yii\Bootstrap\Icons\Tests;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use RuntimeException;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetConverter;
use Yiisoft\Assets\AssetConverterInterface;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Assets\AssetPublisher;
use Yiisoft\Assets\AssetPublisherInterface;
use Yiisoft\Di\Container;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Files\FileHelper;

use function closedir;
use function is_dir;
use function opendir;
use function readdir;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Aliases $aliases;
    protected AssetManager $assetManager;
    private ContainerInterface $container;

    protected function setUp(): void
    {
        parent::setUp();
        $this->container = new Container($this->config());

        $this->aliases = $this->container->get(Aliases::class);
        $this->assetManager = $this->container->get(AssetManager::class);

        $this->aliases->set('@root', dirname(__DIR__, 1));
        $this->aliases->set('@assets', '@root/tests/assets');
        $this->aliases->set('@assetsUrl', '/baseUrl');
        $this->aliases->set('@vendor', '@root/vendor');
        $this->aliases->set('@npm', '@vendor/npm-asset');
    }

    protected function tearDown(): void
    {
        $this->removeAssets('@assets');

        unset($this->aliases, $this->assetManager, $this->container);

        parent::tearDown();
    }

    protected function removeAssets(string $basePath): void
    {
        $handle = opendir($dir = $this->aliases->get($basePath));
        if ($handle === false) {
            throw new RuntimeException("Unable to open directory: $dir");
        }
        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..' || $file === '.gitignore') {
                continue;
            }

            $path = $dir . DIRECTORY_SEPARATOR . $file;

            if (is_dir($path)) {
                FileHelper::removeDirectory($path);
            } else {
                FileHelper::unlink($path);
            }
        }

        closedir($handle);
    }

    private function config(): array
    {
        return [
            LoggerInterface::class => NullLogger::class,

            AssetConverterInterface::class => AssetConverter::class,

            AssetPublisherInterface::class => AssetPublisher::class,

            AssetManager::class => [
                '__class' => AssetManager::class,
                'setConverter()' => [Reference::to(AssetConverterInterface::class)],
                'setPublisher()' => [Reference::to(AssetPublisherInterface::class)],
            ],
        ];
    }
}
