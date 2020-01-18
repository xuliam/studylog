<?php

use Illuminate\Database\Seeder;
use App\AdminUser;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
            'username'=> 'admin',
            'password'=> Hash::make('admin'),
            'state'=>(int)true,
        ]);

    }
}
