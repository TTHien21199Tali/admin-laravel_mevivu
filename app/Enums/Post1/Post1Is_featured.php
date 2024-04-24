<?php

namespace App\Enums\Post1;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Yes()
 * @method static static No()
 */
final class Post1Is_featured extends Enum implements LocalizedEnum
{
    const Yes = 1;
    const No = 2;
}
