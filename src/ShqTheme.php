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

namespace SerendipityHQ\Integration\AnsiConverter;

use SensioLabs\AnsiConverter\Theme\Theme;

final class ShqTheme extends Theme
{
    public function asArray(): array
    {
        return [
            // normal
            'black'     => '#282C34',
            'red'       => '#E06C75',
            'green'     => '#98C375',
            'yellow'    => '#af8700',
            'blue'      => '#5FAFEE',
            'magenta'   => '#af005f',
            'cyan'      => '#D19A66',
            'white'     => '#e4e4e4',

            // bright
            'brblack'   => '#1c1c1c',
            'brred'     => '#d75f00',
            'brgreen'   => '#585858',
            'bryellow'  => '#626262',
            'brblue'    => '#808080',
            'brmagenta' => '#5f5faf',
            'brcyan'    => '#8a8a8a',
            'brwhite'   => '#ffffd7',
        ];
    }
}
