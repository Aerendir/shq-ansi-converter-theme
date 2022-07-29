<?php

declare(strict_types=1);

/*
 * This file is part of the Serendipity HQ AnsiConverter Theme.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Integration\AnsiConverter\Twig;

use SensioLabs\AnsiConverter\AnsiToHtmlConverter;
use SerendipityHQ\Integration\AnsiConverter\ShqTheme;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class AnsiToHtmlExtension extends AbstractExtension
{
    private AnsiToHtmlConverter $ansiConverter;

    public function __construct()
    {
        $theme               = new ShqTheme();
        $this->ansiConverter = new AnsiToHtmlConverter($theme);
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('ansi_to_html', function ($log) {
                return $this->convertAnsiToHtml($log);
            }),
        ];
    }

    public function convertAnsiToHtml($log)
    {
        if (\is_string($log)) {
            return $this->ansiConverter->convert($log);
        }

        if (\is_array($log)) {
            return \array_map(function ($log): ?string {
                return $this->ansiConverter->convert($log);
            }, $log);
        }

        throw new \RuntimeException('"ansi_to_html" Twig filter expects a string or an array.');
    }
}
