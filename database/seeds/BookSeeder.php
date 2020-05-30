<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // data faker indonesia
       $faker = Faker::create();
 
       // membuat data dummy sebanyak 10 record
       for($x = 1; $x <= 10; $x++){

           // insert data dummy pegawai dengan faker
           DB::table('book_lists')->insert([
               'bookName' => $faker->sentence(3),
               'author' => $faker->name,
               'imageBook' => "image",
               'publisher' => $faker->sentence(2),
               'datePublish' => $faker->dateTime(),
               'status' => 0
           ]);

       }
    }
}
