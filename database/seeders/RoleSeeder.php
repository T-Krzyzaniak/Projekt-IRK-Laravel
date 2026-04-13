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
            Role::create(['name' => RoleType::WORKER->value]);
            Role::create(['name' => RoleType::CANDIDATE->value]);
        
        
        

            $userRole = Role::findByName(RoleType::ADMIN->value);
            $userRole->givePermissionTo(PermissionType::CANDIDATE_ACCESS);
            $userRole->givePermissionTo(PermissionType::CANDIDATE_MANAGE);
            $userRole->givePermissionTo(PermissionType::WORKER_ACCESS);
            $userRole->givePermissionTo(PermissionType::WORKER_MANAGE);
            $userRole->givePermissionTo(PermissionType::ADMIN_ACCESS);
            $userRole->givePermissionTo(PermissionType::ADMIN_MANAGE);

            $userRole = Role::findByName(RoleType::WORKER->value);
            $userRole->givePermissionTo(PermissionType::CANDIDATE_ACCESS);
            $userRole->givePermissionTo(PermissionType::CANDIDATE_MANAGE);
            $userRole->givePermissionTo(PermissionType::WORKER_ACCESS);

            $userRole = Role::findByName(RoleType::CANDIDATE->value);
            $userRole->givePermissionTo(PermissionType::WORKER_ACCESS);
            $userRole->givePermissionTo(PermissionType::CANDIDATE_ACCESS);
            $userRole->givePermissionTo(PermissionType::CANDIDATE_MANAGE);
            
    }

}