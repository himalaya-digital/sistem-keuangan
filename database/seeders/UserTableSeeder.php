<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name'     => 'admin',
            'username' => 'admin',
            'jabatan'  => 'admin',
            'password' => Hash::make('admin123')
        ];

        User::create($admin);

        $owner = [
            'name'     => 'owner',
            'username' => 'owner',
            'jabatan'  => 'owner',
            'password' => Hash::make('owner123')
        ];

        User::create($owner);
    }
}
