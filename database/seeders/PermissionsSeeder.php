<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();
        Permission::truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('role_has_permissions')->truncate();

        $roles = ['superadmin', 'admin', 'writer', 'user'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $adminAccessPermission = Permission::create(['name' => 'admin access']);
        $adminRole = Role::whereName('admin')->first();
        $adminRole->givePermissionTo($adminAccessPermission);

        $writerRole = Role::whereName('writer')->first();
        $writerPermissions = [
            'services read',
            'services create',
            'services update',
            'services delete',
            'product categories read',
            'product categories create',
            'product categories update',
            'product categories delete',
            'product posts read',
            'product posts create',
            'product posts update',
            'product posts delete',
            'blog categories read',
            'blog categories create',
            'blog categories update',
            'blog categories delete',
            'blogs read',
            'blogs create',
            'blogs update',
            'blogs delete',
            'galleries read',
            'galleries create',
            'galleries update',
            'galleries delete',
        ];

        foreach ($writerPermissions as $name) {
            $permission = Permission::create(['name' => $name]);
            $writerRole->givePermissionTo($permission);
        }

        $writerRole->givePermissionTo($adminAccessPermission);

        $otherPermissions = [
            'users read',
            'users create',
            'users update',
            'users delete',
            'roles read',
            'roles create',
            'roles update',
            'roles delete',
            'sliders read',
            'sliders create',
            'sliders update',
            'sliders delete',
            'customers read',
            'customers create',
            'customers update',
            'customers delete',
            'testimonis read',
            'testimonis create',
            'testimonis update',
            'testimonis delete',
            'inboxes read',
            'inboxes create',
            'inboxes update',
            'inboxes delete',
            'subscribes read',
            'subscribes create',
            'subscribes update',
            'subscribes delete',
            'settings',
            'socials read',
            'socials create',
            'socials update',
            'socials delete',
            'hotels read',
            'hotels create',
            'hotels update',
            'hotels delete',
            'pilgrimage types read',
            'pilgrimage types create',
            'pilgrimage types update',
            'pilgrimage types delete',
            'pilgrimage batches read',
            'pilgrimage batches create',
            'pilgrimage batches update',
            'pilgrimage batches delete',
            'transportations read',
            'transportations create',
            'transportations update',
            'transportations delete',
            'transportation trips read',
            'transportation trips create',
            'transportation trips update',
            'transportation trips delete',
            'itineraries read',
            'itineraries create',
            'itineraries update',
            'itineraries delete',
        ];

        foreach ($otherPermissions as $name) {
            Permission::create(['name' => $name]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
