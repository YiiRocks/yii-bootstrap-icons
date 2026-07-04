<?php

declare(strict_types=1);

namespace YiiRocks\Yii\Bootstrap\Icons\Tests;

use YiiRocks\Yii\Bootstrap\Icons\Assets\BootstrapIconsAsset;

final class AssetTest extends TestCase
{
    public function testAssetRegister(): void
    {
        $bundle = new BootstrapIconsAsset();

        self::assertEmpty($this->manager->getCssFiles());

        $this->manager->register(BootstrapIconsAsset::class);

        $bundleUrl = $this->publisher->getPublishedUrl($bundle->sourcePath) . '/' . $bundle->css[0];
        self::assertEquals($bundleUrl, $this->manager->getCssFiles()[$bundleUrl][0]);
    }

    public function testPublishFiltersToCssAndFonts(): void
    {
        $bundle = new BootstrapIconsAsset();

        $this->publisher->publish($bundle);

        $publishedPath = $this->publisher->getPublishedPath($bundle->sourcePath);

        self::assertFileExists($publishedPath . '/bootstrap-icons.css');
        self::assertFileExists($publishedPath . '/fonts/bootstrap-icons.woff2');
        self::assertFileDoesNotExist($publishedPath . '/bootstrap-icons.min.css');
        self::assertFileDoesNotExist($publishedPath . '/bootstrap-icons.scss');
    }
}
