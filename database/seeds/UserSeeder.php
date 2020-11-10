<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'Administer roles & permissions', 'guard_name' => 'web']);

        Role::create(['name' => 'Customer']);
        Role::create(['name' => 'Pegawai']);
        Role::create(['name' => 'Admin']);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@zk.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $admin->assignRole('Admin');
        $admin->givePermissionTo('Administer roles & permissions');
        Pegawai::create([
            'nama' => 'Admin',
            'jenis_kelamin' => '-',
            'nohp' => '0822222222',
            'alamat' => 'Pelaihari',
            'user_id' => $admin->id
        ]);
    }
}
