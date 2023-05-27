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
                'namalengkap'   => 'nurudin rahman',
                'username'      => 'nurudin',
                'email'         => 'nurudin@example.com',
                'password'      =>  bcrypt('kader'),
                'jabatan'       => 'kader',
                'idposyandu'    => 1,
            ]
            ];

            foreach ($user as $key => $value)
            {
                User::create($value);
            }
    }
}
