<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */ 
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('books')->insert([
            'book_name' => "Harry Potter",
            'book_author' => "JK Rowling",
            'book_category' => "Adventure"
        ]);
        DB::table('books')->insert([
            'book_name' => "Ata demirkıranın hayatı",
            'book_author' => "Tolga göbel",
            'book_category' => "adventure"
        ]);
    }
}
