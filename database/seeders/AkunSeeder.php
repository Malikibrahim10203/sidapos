<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'namalengkap'   => 'susan kader',
                'username'      => 'susan',
                'email'         => 'susan@example.com',
                'password'      =>  bcrypt('admin'),
                'jabatan'       => 'admin',
                'idposyandu'    => 1,
            ]
            ];

            foreach ($user as $key => $value)
            {
                User::create($value);
            }
    }
}
