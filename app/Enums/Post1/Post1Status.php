<?php

namespace App\Enums\Post1;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Published()
 * @method static static Draft()
 */
final class Post1Status extends Enum implements LocalizedEnum
{
    const Published = 1;
    const Draft = 2;
}
