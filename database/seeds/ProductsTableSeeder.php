<?php

use Illuminate\Database\Seeder;
use App\Product;
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
        'name'=> 'Iphone xs 64 gold',
        'slug' =>'Iphone-xs-64-gold',
        'details'=> '6,2 inch OLED Retina 4gb RAM',
        'price' => 159999 ,
        'description'=>'Best iphone you ewer seen 7nm processor most powerful in history',
        ]);
        Product::create([
        'name'=> 'Iphone xs 256 gold',
        'slug' =>'Iphone-xs-256-gold',
        'details'=> '6.2 inch OLED Retina 4gb RAM',
        'price' => 179999 ,
        'description'=>'Best iphone you ewer seen 7nm processor most powerful in history',
        
            ]);
        Product::create([
        'name'=> 'Iphone xs 512 gold',
        'slug' =>'Iphone-xs-512-gold',
         'details'=> '6.2 inch OLED Retina 4gb RAM',
         'price' => 199999 ,
         'description'=>'Best iphone you ewer seen 7nm processor most powerful in history',
        
                ]);
                Product::create([
                    'name'=> 'Iphone xs 64 space gray',
                    'slug' =>'Iphone-xs-64-gray',
                    'details'=> '6.2 inch OLED Retina 4gb RAM',
                    'price' => 159999 ,
                    'description'=>'Best iphone you ewer seen 7nm processor most powerful in history',
                   
                    ]);
                    Product::create([
                        'name'=> 'Iphone xs 256 space gray',
                        'slug' =>'Iphone-xs-256-gray',
                        'details'=> '6.2 inch OLED Retina 4gb RAM',
                        'price' => 179999 ,
                        'description'=>'Best iphone you ewer seen 7nm processor most powerful in history',
                        
                        ]);
    }
}
