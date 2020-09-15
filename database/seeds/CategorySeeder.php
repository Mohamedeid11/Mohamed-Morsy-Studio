<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create(['name' => 'Wedding']);
        Category::create(['name' => 'Engagement']);
        Category::create(['name' => 'Couples']);
        Category::create(['name' => 'Products']);
    }
}
