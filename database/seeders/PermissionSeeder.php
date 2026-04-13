<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Seeder;
use App\Enums\Auth\PermissionType;

class PermissionSeeder extends Seeder{

    public function run():void{
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            PermissionType::CANDIDATE_ACCESS->value,
            PermissionType::CANDIDATE_MANAGE->value,
            PermissionType::WORKER_ACCESS->value,
            PermissionType::WORKER_MANAGE->value,
            PermissionType::ADMIN_ACCESS->value,
            PermissionType::ADMIN_MANAGE->value,
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        
    }

}