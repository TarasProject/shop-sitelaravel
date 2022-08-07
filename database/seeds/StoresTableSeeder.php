<?php

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'name_store' => 'Comfy',
        ]);

        Store::create([
            'name_store' => 'Foxtrot',
        ]);

        Store::create([
            'name_store' => 'Electron',
        ]);

        Store::create([
            'name_store' => 'Metro',
        ]);

        Store::create([
            'name_store' => 'Orbita',
        ]);
    }
}
