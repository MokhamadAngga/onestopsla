<?php

use App\User;
use Faker\Factory;
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
        $faker = Factory::create('id_ID');

        User::create([
            'name' => 'Admin',
            'nip' => $faker->nik(),
            'email' => 'admin@email.com',
            'password' => bcrypt('secret'),
            'admin' => true
        ]);
        for ($c = 0; $c <= 5; $c++) {
            User::create([
                'name' => $faker->name,
                'nip' => $faker->nik(),
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'admin' => true
            ]);
        }

        User::create([
            'name' => 'Pengguna',
            'nip' => $faker->nik(),
            'email' => 'pengguna@email.com',
            'password' => bcrypt('secret'),
        ]);
        for ($c = 0; $c <= 10; $c++) {
            User::create([
                'name' => $faker->name,
                'nip' => $faker->nik(),
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
            ]);
        }

    }
}
