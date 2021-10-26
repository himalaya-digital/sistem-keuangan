<?php

namespace Database\Seeders;

use App\Models\TipeAkun;
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

        $aktiva = [
            'id'        => 1,
            'tipe_akun' => 'Aktiva Lancar',
        ];

        TipeAkun::create($aktiva);

        $aktivatetap = [
            'id'        => 2,
            'tipe_akun' => 'Aktiva Tetap',
        ];

        TipeAkun::create($aktivatetap);

        $utangLancar = [
            'id'        => 3,
            'tipe_akun' => 'Utang Lancar',
        ];

        TipeAkun::create($utangLancar);

        $modal = [
            'id'        => 4,
            'tipe_akun' => 'Modal',
        ];

        TipeAkun::create($modal);

        $debit = [
            'id'        => 5,
            'tipe_akun' => 'Debit',
        ];

        TipeAkun::create($debit);

        $kredit = [
            'id'        => 6,
            'tipe_akun' => 'Kredit',
        ];

        TipeAkun::create($kredit);

        $utang = [
            'id'        => 7,
            'tipe_akun' => 'Utang',
        ];

        TipeAkun::create($utang);
    }
}
