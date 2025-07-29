<?php

declare(strict_types=1);

namespace YiiRocks\Yii\Bootstrap\Icons\Tests;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Assets\AssetPublisherInterface;
use Yiisoft\Config\Config;
use Yiisoft\Config\ConfigPaths;
use Yiisoft\Di\Container;
use Yiisoft\Di\ContainerConfig;
use Yiisoft\Files\FileHelper;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Aliases $aliases;
    protected AssetManager $manager;
    protected AssetPublisherInterface $publisher;
    private ContainerInterface $container;

    protected function setUp(): void
    {
        parent::setUp();
        $config = new Config(
            new ConfigPaths(dirname(__DIR__), 'config'),
        );
        $containerConfig = ContainerConfig::create()
            ->withDefinitions(
                $config->get('di')
                +
                [LoggerInterface::class => NullLogger::class]
            );
        $this->container = new Container($containerConfig);
        $this->aliases = $this->container->get(Aliases::class);
        $this->aliases->set('@root', dirname(__DIR__));
        $this->aliases->set('@assets', '@root/tests/assets');
        $this->aliases->set('@assetsUrl', '/baseUrl');
        $this->aliases->set('@vendor', '@root/vendor');
        $this->manager = $this->container->get(AssetManager::class);
        $this->publisher = $this->container->get(AssetPublisherInterface::class);
        FileHelper::ensureDirectory($this->aliases->get('@assets'), 0775);
    }

    protected function tearDown(): void
    {
        FileHelper::removeDirectory($this->aliases->get('@assets'));
        parent::tearDown();
    }
}
