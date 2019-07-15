<?php
/**
 * Created by PhpStorm.
 * User: Mokhamad Angga
 * Date: 29-Jun-19
 * Time: 19:43
 */

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            BarangSeeder::class,
            KomplainSeeder::class
        ]);
    }
}