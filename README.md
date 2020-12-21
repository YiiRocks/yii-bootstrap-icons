# Bootstrap Icons Assets

Yii3 Asset bundle for the Bootstrap Icons

[![Packagist Version](https://img.shields.io/packagist/v/yiirocks/yii-bootstrap-icons.svg)](https://packagist.org/packages/yiirocks/yii-bootstrap-icons)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/yiirocks/yii-bootstrap-icons.svg)](https://php.net/)
[![Packagist](https://img.shields.io/packagist/dt/yiirocks/yii-bootstrap-icons.svg)](https://packagist.org/packages/yiirocks/yii-bootstrap-icons)
[![GitHub](https://img.shields.io/github/license/yiirocks/yii-bootstrap-icons.svg)](https://github.com/yiirocks/yii-bootstrap-icons/blob/master/LICENSE)

## Installation

The package could be installed via composer:

```bash
composer require yiirocks/yii-bootstrap-icons
```

## Usage

```php
use YiiRocks\Yii\Bootstrap\Icons\Assets\BootstrapIconsAsset;

$assetManager->register([
    BootstrapIconsAsset::class,
]);
```

## Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```bash
./vendor/bin/phpunit
```

[![Code Climate maintainability](https://img.shields.io/codeclimate/maintainability/YiiRocks/yii-bootstrap-icons.svg)](https://codeclimate.com/github/YiiRocks/yii-bootstrap-icons/maintainability)
[![Codacy branch grade](https://img.shields.io/codacy/grade/1a80083546d049dc83a682b93901e4bc/master.svg)](https://app.codacy.com/gh/YiiRocks/yii-bootstrap-icons)
[![Scrutinizer code quality (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/quality/g/yiirocks/yii-bootstrap-icons/master.svg)](https://scrutinizer-ci.com/g/yiirocks/yii-bootstrap-icons/?branch=master)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/yiirocks/yii-bootstrap-icons/analysis)