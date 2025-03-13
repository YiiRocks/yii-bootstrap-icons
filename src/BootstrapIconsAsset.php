<?php

declare(strict_types=1);

namespace YiiRocks\Yii\Bootstrap\Icons\Assets;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

/**
 * Asset bundle for the Bootstrap Icons CSS
 */
final class BootstrapIconsAsset extends AssetBundle
{
    public ?string $basePath = '@assets';

    public ?string $baseUrl = '@assetsUrl';

    public array $css = [
        'bootstrap-icons.css',
    ];

    public ?string $sourcePath = '@vendor/twbs/bootstrap-icons/font';

    public function __construct()
    {
        $this->publishOptions = [
            'filter' => (new PathMatcher())->only('**/bootstrap-icons.css', '**/fonts/**'),
        ];
    }
}
