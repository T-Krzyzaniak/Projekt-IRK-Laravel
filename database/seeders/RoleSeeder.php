<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Seeder;
use App\Enums\Auth\PermissionType;
use Spatie\Permission\PermissionServiceProvider;
use App\Enums\Auth\RoleType;

Class RoleSeeder extends Seeder{

    public function run():void{
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
            Role::create(['name' => RoleType::ADMIN->value]);
            Role::create(['name' => RoleType::PHYSICIAN->value]);
            Role::create(['name' => RoleType::PATIENT->value]);
        
        
        

            $userRole = Role::findByName(RoleType::ADMIN->value);
            $userRole->givePermissionTo(PermissionType::USER_ACCESS);
            $userRole->givePermissionTo(PermissionType::USER_MANAGE);
            $userRole->givePermissionTo(PermissionType::WORKER_ACCESS);
            $userRole->givePermissionTo(PermissionType::WORKER_MANAGE);
            $userRole->givePermissionTo(PermissionType::PATIENT_ACCESS);
            $userRole->givePermissionTo(PermissionType::PATIENT_MANAGE);

            $userRole = Role::findByName(RoleType::PHYSICIAN->value);
            $userRole->givePermissionTo(PermissionType::USER_ACCESS);
            $userRole->givePermissionTo(PermissionType::WORKER_ACCESS);
            $userRole->givePermissionTo(PermissionType::PATIENT_ACCESS);
            $userRole->givePermissionTo(PermissionType::PATIENT_MANAGE);

            $userRole = Role::findByName(RoleType::PATIENT->value);
            $userRole->givePermissionTo(PermissionType::WORKER_ACCESS);
    }

}