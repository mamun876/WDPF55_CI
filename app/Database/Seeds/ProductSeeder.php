<?php

namespace App\Database\Seeds;

use App\Models\ProductModel;
use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
         // Helper to generate random values
         helper('text');

         // Insert 5 Records with Dynamic values 
         for($num=0;$num<5;$num++){
             $product = new ProductModel();

             $insertdata['category_id'] = rand('1',2);
            //  $insertdata['category'] = random_string('alpha',5);
             $insertdata['model'] = random_string('alpha',5);
             $insertdata['price'] = rand(10,200);
             $insertdata['sku'] = random_string('alpha',10);

             $product->insert($insertdata);
         }
    }
}
