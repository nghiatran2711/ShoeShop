<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'Nam' => ['Giày thể thao', 'Giày lười','Giày boot','Sandal','Dép'],
            'Nữ' => ['Giày thể thao', 'Giày cao gót','Sandal nữ','Giày búp bê','Giày lười','Dép nữ'],
            'Trẻ em'=>['Giày thể thao','Giày boot','Giày tập đi','Sandals','Dép']
        ];
        
        foreach ($data as $category => $subCategories)
        {
            $id = Category::create(['name' => $category,'parent_id'=>0])->id;
        
            foreach ($subCategories as $subCategory) {
                Category::create([
                    'name' => $subCategory,
                    'parent_id' => $id,
                ]);
            }
        }
    }
}
