<?php

namespace App\Enums\Auth;
use App\Enums\Traits\EnumToArray;
enum PermissionType: string
{
    use EnumToArray;
    case CANDIDATE_ACCESS = 'user access';
    case CANDIDATE_MANAGE = 'user manage';
    case WORKER_ACCESS = 'worker access';
    case WORKER_MANAGE = 'worker manage';
    case ADMIN_ACCESS = 'admin access';
    case ADMIN_MANAGE = 'admin manage';
 
}
