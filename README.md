<p align="center">
    <a href="http://www.serendipityhq.com" target="_blank">
        <img style="max-width: 350px" src="http://www.serendipityhq.com/assets/open-source-projects/Logo-SerendipityHQ-Icon-Text-Purple.png">
    </a>
</p>

<h1 align="center">Serendipity HQ Ansi Converter Theme</h1>
<p align="center">A theme to use with AnsiConverter.</p>
<p align="center">
    <a href="https://github.com/SerendipityHQ/ansi-converter-shq-theme/releases"><img src="https://img.shields.io/packagist/v/serendipity_hq/ansi-converter-shq-theme.svg?style=flat-square"></a>
    <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square"></a>
</p>

## Current Status

[![Phan](https://github.com/SerendipityHQ/ansi-converter-shq-theme/workflows/Phan/badge.svg)](https://github.com/SerendipityHQ/ansi-converter-shq-theme/actions?query=branch%3Adev)
[![PHPStan](https://github.com/SerendipityHQ/ansi-converter-shq-theme/workflows/PHPStan/badge.svg)](https://github.com/SerendipityHQ/ansi-converter-shq-theme/actions?query=branch%3Adev)
[![PSalm](https://github.com/SerendipityHQ/ansi-converter-shq-theme/workflows/PSalm/badge.svg)](https://github.com/SerendipityHQ/ansi-converter-shq-theme/actions?query=branch%3Adev)
[![PHPUnit](https://github.com/SerendipityHQ/ansi-converter-shq-theme/workflows/PHPunit/badge.svg)](https://github.com/SerendipityHQ/ansi-converter-shq-theme/actions?query=branch%3Adev)
[![Composer](https://github.com/SerendipityHQ/ansi-converter-shq-theme/workflows/Composer/badge.svg)](https://github.com/SerendipityHQ/ansi-converter-shq-theme/actions?query=branch%3Adev)
[![PHP CS Fixer](https://github.com/SerendipityHQ/ansi-converter-shq-theme/workflows/PHP%20CS%20Fixer/badge.svg)](https://github.com/SerendipityHQ/ansi-converter-shq-theme/actions?query=branch%3Adev)
[![Rector](https://github.com/SerendipityHQ/ansi-converter-shq-theme/workflows/Rector/badge.svg)](https://github.com/SerendipityHQ/ansi-converter-shq-theme/actions?query=branch%3Adev)

<hr />
<h3 align="center">
    <b>Do you like this library?</b><br />
    <b><a href="#js-repo-pjax-container">LEAVE A &#9733;</a></b>
</h3>
<p align="center">
    or run <br />
    <code>composer global require symfony/thanks && composer thanks</code><br />
    to say thank you to all libraries you use in your current project, this included!
</p>
<hr />

## Install monolog-html-line-formatter via Composer

    $ composer require serendipity_hq/ansi-converter-shq-theme

This library follows the http://semver.org/ versioning conventions.

## How to use Serendipity HQ Rector Config

```php
<?php

declare(strict_types = 1);

use SerendipityHQ\Integration\Rector\SerendipityHQ;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;

return static function (ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_81);
    $parameters->set(Option::PATHS, [__DIR__ . '/src', __DIR__ . '/tests']);
    $parameters->set(Option::BOOTSTRAP_FILES, [__DIR__ . '/vendor-bin/phpunit/vendor/autoload.php']);

    // Import directly the configuration from Serendipity HQ Rector Config
    $containerConfigurator->import(SerendipityHQ::SHQ_SYMFONY_APP);

    // Import the excluded rectors
    $toSkip = SerendipityHQ::buildToSkip(SerendipityHQ::SHQ_SYMFONY_APP_SKIP);

    // Set the rectors to exclude
    $parameters->set(Option::SKIP, $toSkip);
};
```

The method `SerendipityHQ::buildToSkip()` is variadic: it accepts as many arrays as you need.

Use it to exclude the rectors you don't want to be applied in your project.

If you want to exclude other rectors other than the ones excluded by the predefined config, simply create an array in your `rector.php` configuration file and pass it to `SerendipityHQ::buildToSkip()`:

```php
<?php

declare(strict_types = 1);

use SerendipityHQ\Integration\Rector\SerendipityHQ;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;

return static function (ContainerConfigurator $containerConfigurator) : void {
    ...

    $othersToSkip = [
        \Rector\To\Exclude\Rector::class
    ];

    // Import the excluded rectors
    $toSkip = SerendipityHQ::buildToSkip(SerendipityHQ::SHQ_SYMFONY_APP_SKIP, $othersToSkip);

    // Set the rectors to exclude
    $parameters->set(Option::SKIP, $toSkip);
};
```

<hr />
<h3 align="center">
    <b>Do you like this library?</b><br />
    <b><a href="#js-repo-pjax-container">LEAVE A &#9733;</a></b>
</h3>
<p align="center">
    or run<br />
    <code>composer global require symfony/thanks && composer thanks</code><br />
    to say thank you to all libraries you use in your current project, this included!
</p>
<hr />
