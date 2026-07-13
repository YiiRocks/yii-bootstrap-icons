# Bootstrap Icons Assets

Yii3 Asset bundle for the Bootstrap Icons

[![Packagist Version](https://img.shields.io/packagist/v/yiirocks/yii-bootstrap-icons.svg)](https://packagist.org/packages/yiirocks/yii-bootstrap-icons)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/yiirocks/yii-bootstrap-icons.svg)](https://php.net/)
[![Packagist](https://img.shields.io/packagist/dt/yiirocks/yii-bootstrap-icons.svg)](https://packagist.org/packages/yiirocks/yii-bootstrap-icons)
[![GitHub](https://img.shields.io/github/license/yiirocks/yii-bootstrap-icons.svg)](https://github.com/yiirocks/yii-bootstrap-icons/blob/main/LICENSE.md)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/yiirocks/yii-bootstrap-icons/build.yml?branch=main)](https://github.com/yiirocks/yii-bootstrap-icons/actions)

Stats for Nerds

[![Coverage](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fyiirocks%2Fyii-bootstrap-icons%2Fbadges%2Fcoverage.json)](https://github.com/yiirocks/yii-bootstrap-icons/tree/badges)
[![MSI](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fyiirocks%2Fyii-bootstrap-icons%2Fbadges%2Fmsi.json)](https://github.com/yiirocks/yii-bootstrap-icons/tree/badges)
[![Tests](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fyiirocks%2Fyii-bootstrap-icons%2Fbadges%2Ftests.json)](https://github.com/yiirocks/yii-bootstrap-icons/tree/badges)
[![Assertions](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fyiirocks%2Fyii-bootstrap-icons%2Fbadges%2Fassertions.json)](https://github.com/yiirocks/yii-bootstrap-icons/tree/badges)

## Installation

The package could be installed via composer:

```bash
composer require yiirocks/yii-bootstrap-icons
```

## Usage

```php
use YiiRocks\Yii\Bootstrap\Icons\Assets\BootstrapIconsAsset;

$assetManager->register(
    BootstrapIconsAsset::class,
);
```

## Unit testing

The package is tested with [Psalm](https://psalm.dev/), [PHPUnit](https://phpunit.de/) and [Infection](https://infection.github.io/). To run tests:

```bash
composer psalm
composer phpunit
composer infection
```
