<?php

use App\Models\Komplain;
use App\Models\Barang;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class KomplainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($c=0;$c<=10;$c++){
            Komplain::create([
                'user_id' => rand(User::where('admin',false)->min('id'),User::where('admin',false)->max('id')),
                'barang_id' => rand(Barang::where('kategori','!=','Ruang')->min('id'), Barang::where('kategori','!=','Ruang')->max('id')),
                'tanggal_pinjam' => now()->format('Y-m-d'),
                'keluhan' => $faker->paragraph
            ]);
        }
    }
}
