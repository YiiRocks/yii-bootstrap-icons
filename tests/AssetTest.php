<?php

declare(strict_types=1);

namespace YiiRocks\Yii\Bootstrap\Icons\Tests;

use YiiRocks\Yii\Bootstrap\Icons\Assets\BootstrapIconsAsset;

final class AssetTest extends TestCase
{
    /**
     * @return array
     */
    public function registerDataProvider(): array
    {
        return [
            [
                'Css',
                BootstrapIconsAsset::class,
            ],
        ];
    }

    /**
     * @dataProvider registerDataProvider
     *
     * @param string $type
     * @param string $asset
     * @param string|null $depend
     */
    public function testAssetRegister(string $type, string $asset, ?string $depend = null): void
    {
        $publisher = $this->assetManager->getPublisher();

        $bundle = new $asset();

        if ($depend !== null) {
            $depend = new $depend();
        }

        self::assertEmpty($this->assetManager->getAssetBundles());

        $this->assetManager->register([$asset]);

        if ($type === 'Css') {
            if ($depend !== null) {
                $dependUrl = $publisher->getPublishedUrl($depend->sourcePath) . '/' . $depend->css[0];
                self::assertEquals($dependUrl, $this->assetManager->getCssFiles()[$dependUrl]['url']);
            } else {
                $bundleUrl = $publisher->getPublishedUrl($bundle->sourcePath) . '/' . $bundle->css[0];
                self::assertEquals($bundleUrl, $this->assetManager->getCssFiles()[$bundleUrl]['url']);
            }
        }
    }
}
