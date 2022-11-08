<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

// https://github.com/BenSampo/laravel-enum
final class FileType extends Enum
{
    const BOOK = 1;  // done
    const LINK = 2; // done
    const CAROUSEL = 3; // done
    const MP4 = 4;  // done
}
