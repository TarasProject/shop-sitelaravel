<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([

            'type_object' => 'Notebook',
            'firm_object' => 'Aser',
            'model_object' => 'G5',
            'file_name'=>'aser_notebook.jpeg',
            'file_size'=>'6803',
            'price' => '30000',
            'type_currency'=>'UHA',

            'condition' => 'Новий',
            'phone' => '123456',
            'more_information' => 'Ок',
            'remember' => Product::REMEMBER_TRUE,
            'user_id' => 1,
            'store_id' => 1,

        ]);
        Product::create([

            'type_object' => 'Smartphone',
            'firm_object' => 'Lenovo',
            'model_object' => 'A50',
            'file_name'=>'lenovo_smartphone.jpg',
            'file_size'=>'24809',

            'price' => '25000',
            'type_currency'=>'UHA',

            'condition' => 'Новий',
            'phone' => '123456',
            'more_information' => 'Ок',
            'remember' => Product::REMEMBER_TRUE,
            'user_id' => 2,
            'store_id' => 2,

        ]);

        factory(Product::class,10)->create();
    }
}
