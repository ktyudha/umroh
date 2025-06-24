<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('model_has_roles')->truncate();

        // Create or find the role
        $superadminRole = Role::firstOrCreate(['name' => 'superadmin']);

        // Assign all permissions to superadmin role
        $superadminRole->syncPermissions(Permission::all());

        $superadmin = User::create([
            'name' => 'Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $superadmin->assignRole('superadmin');

        Schema::enableForeignKeyConstraints();
    }
}
