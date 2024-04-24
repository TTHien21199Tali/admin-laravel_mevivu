<?php

use App\Enums\Admin\AdminRoles;
use App\Enums\DefaultStatus;
use App\Enums\Gender;
use App\Enums\Is_featured;


return [
    AdminRoles::class => [
        AdminRoles::SuperAdmin->value => 'Dev',
        AdminRoles::Admin->value => 'Admin',
    ],
    Gender::class => [
        Gender::Male->value => 'Nam',
        Gender::Female->value => 'Nữ',
        Gender::Other->value => 'Khác',
    ],
    DefaultStatus::class => [
        DefaultStatus::Published->value => 'Đã xuất bản',
        DefaultStatus::Draft->value => 'Bản nháp'
    ],
    
    Is_featured::class => [
        Is_featured::Yes->value => 'Có',
        Is_featured::No->value => 'Không'
    ],

];