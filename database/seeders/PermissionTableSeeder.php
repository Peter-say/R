<?php

namespace Database\Seeders;

use App\Services\Auth\AuthorizationService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        $data = array_merge(
            $this->crud('user'),
            $this->crud('property'),
            $this->crud('blog'),
            $this->crud('review'),
            $this->crud('comment'),
            [
                [
                    "name" => "can_edit_authorization_settings",
                    "guard_name" => "web"
                ],
            ]
        );

        foreach ($data as $perm) {
            Permission::firstOrCreate($perm);
        }
        (new AuthorizationService)->syncSudoRoles();
    }

    public function crud($model, array $actions = null, $guard = "web")
    {
        $list = [];
        foreach (["create", "read", "update", "delete"] as $action) {
            $list[] = [
                "name" => "can_" . $action . "_" . strtolower($model),
                "guard_name" => $guard,
            ];
        }
        return $list;
    }
}
