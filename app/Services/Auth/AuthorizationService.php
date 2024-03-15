<?php

namespace App\Services\Auth;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthorizationService{

    // public static function hasPermissionTo(array $permissions , User $user = null)
    // {
    //     $user = $user ?? auth()->user();
    //     if(!$user->hasAnyPermission($permissions)){
    //         abort(403);
    //     }
    //     return true;
    // }

    // public static function hasRole(array $roles , User $user = null)
    // {
    //     $user = $user ?? auth()->user();
    //     if(!$user->hasRole($roles)){
    //         abort(403);
    //     }
    // }

    public function syncSudoRoles()
    {
        if(!empty($sudo = developer())){
            $role = Role::firstOrCreate(["name" => "Sudo"]);
            $permissions = Permission::where("guard_name" , "web")->pluck("name")->toArray();
            $role->syncPermissions($permissions);
            $sudo->syncRoles([$role]);
        }
    }
}