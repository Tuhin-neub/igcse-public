<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'role_id' => '1',
            'employee_id' => '0',
            'name' => 'MD. Super Admin',
            'email' => 'super-admin@dlab.com',
            'password' => bcrypt('dlabsuperadmin'),
            'status' => '1',
        ]);

        DB::table('admins')->insert([
            'role_id' => '2',
            'employee_id' => '0',
            'name' => 'MD. Admin',
            'email' => 'admin@dlab.com',
            'password' => bcrypt('dlabadmin'),
            'status' => '1',
        ]);

        DB::table('users')->insert([
            'role_id' => '5',
            'employee_id' => '0',
            'name' => 'MD. User',
            'email' => 'user@dlab.com',
            'password' => bcrypt('dlabuser'),
            'status' => '1',
        ]);

        DB::table('system_infos')->insert([
            'system_name' => 'Auth System',
            'address' => 'Sylhet',
            'phone' => '01XXXXXXXXX',
            'email' => 'info@dlab.com'
        ]);
    }
}
