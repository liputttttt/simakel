<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class suratmasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // create faker indonesia
        
        for($i=1;$i<=100;$i++){ 
        DB::table('suratmasuks')->insert([
            'nosurat' => $faker->title(),
            'tgl' => $faker->date(),
            'kirim' => $faker->word(),
            'brkas' => $faker->imageUrl(),
        ]);
        }
    }
}
