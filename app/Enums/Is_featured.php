<?php

namespace App\Enums;

use App\Supports\Enum;

enum Is_featured: int
{
    use Enum;

    case Yes = 1;
    case No = 2;

    public function badge(){
        return match($this) {
            Is_featured::Yes => 'bg-green',
            Is_featured::No => '',
        };
    }

    
}
