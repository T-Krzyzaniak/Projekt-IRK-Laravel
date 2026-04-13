<?php

namespace App\Enums\Auth;
use App\Enums\Traits\EnumToArray;
enum PermissionType: string
{
    use EnumToArray;
    case USER_ACCESS = 'user access';
    case USER_MANAGE = 'user manage';
    case WORKER_ACCESS = 'worker access';
    case WORKER_MANAGE = 'worker manage';
    case PATIENT_ACCESS = 'patient access';
    case PATIENT_MANAGE = 'patient manage';
 
}
