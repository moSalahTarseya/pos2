<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\CountryCode;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::where('email', 'test@test.com')->first();

        if(!$admin){
            $admin =  Admin::updateOrCreate([
                'name' => 'مدير النظام',
                'email' => 'test@test.com',
                'password' => bcrypt(123456),
            ]);
        }

    }
}
