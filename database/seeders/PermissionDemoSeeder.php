<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // reset cahced roles and permission
         app()[PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
         Permission::create(['name' => 'view posts']);
         Permission::create(['name' => 'create posts']);
         Permission::create(['name' => 'edit posts']);
         Permission::create(['name' => 'delete posts']);
         Permission::create(['name' => 'publish posts']);
         Permission::create(['name' => 'unpublish posts']);

         $pegawaiRole = Role::create(['name' => 'pegawai']);
         $pegawaiRole->givePermissionTo('view posts');
         $pegawaiRole->givePermissionTo('create posts');
         $pegawaiRole->givePermissionTo('edit posts');
         $pegawaiRole->givePermissionTo('delete posts');
         $pegawaiRole->givePermissionTo('publish posts');
         $pegawaiRole->givePermissionTo('unpublish posts');

         $superadminRole = Role::create(['name' => 'master']);

         $user = User::factory()->create([
             'name' => 'pegawai',
             'email' => 'pegawai@qadrlabs.com',
             'password' => bcrypt('12345678')
         ]);
         $user->assignRole($pegawaiRole);

         $user = User::factory()->create([
             'name' => 'master',
             'email' => 'master@inova-medika.com',
             'password' => bcrypt('12345678')
         ]);
         $user->assignRole($superadminRole);
    }
}
