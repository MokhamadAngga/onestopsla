<?php

use App\User;
use App\Models\PeminjamanRumah;
use App\Models\PeminjamanMobil;
use App\Models\PeminjamanRuang;
use App\Models\Barang;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $rumah = Barang::create([
            'kode' => 1001,
            'nama' => 'Rumah Istirahat',
            'kategori' => 'Rumah',
        ]);
        for ($c = 0; $c <= 1; $c++) {
            PeminjamanRumah::create([
                'user_id' => rand(User::where('admin', false)->min('id'), User::where('admin', false)->max('id')),
                'barang_id' => $rumah->id,
                'jumlah_orang' => rand(4, 15),
                'tanggal_pinjam' => now()->format('Y-m-d'),
                'tanggal_kembali' => now()->addDays(2)->format('Y-m-d'),
                'keterangan' => $faker->paragraph,
            ]);
        }

        $rooms = ['SINGOSARI lt.5', 'KAHURIPAN lt.5', 'BLAMBANGAN lt.4', 'SLA lt.3', 'PBI lt.3',
            'KA-GRUP SPPUR-SLA lt.3', 'KA GAPE lt.3', 'SPPUR lt.2'];
        foreach ($rooms as $index => $room){
            $index = $index +1;
            $ruangan = Barang::create([
                'kode' => '200'.$index,
                'nama' => $room,
                'kategori' => 'Ruang',
            ]);

            PeminjamanRuang::create([
                'user_id' => rand(User::where('admin', false)->min('id'), User::where('admin', false)->max('id')),
                'barang_id' => $ruangan->id,
                'keterangan_penggunaan' => $faker->sentence,
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now()->addHours(2),
                'bentuk_meja' => rand(0,1) ? 'Classroom' : 'U-shape',
                'custom_request' => $faker->paragraph,
            ]);
        }

        $cars = ['INNOVA-1','INNOVA-2','INNOVA-3','INNOVA-4','INNOVA-5','HILUX','HIACE'];
        foreach ($cars as $index =>$car){
            $index = $index +1;
            $mobil = Barang::create([
                'kode' => '300'.$index,
                'nama' => $car,
                'kategori' => 'Mobil',
            ]);

            PeminjamanMobil::create([
                'user_id' => rand(User::where('admin', false)->min('id'), User::where('admin', false)->max('id')),
                'barang_id' => $mobil->id,
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now()->addDays(2)->format('Y-m-d'),
                'keterangan_penggunaan' => $faker->sentence,
                'jumlah_orang' => rand(1,8),
            ]);
        }
    }
}
