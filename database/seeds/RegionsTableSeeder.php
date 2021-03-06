<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'name' => 'Ontario',
        ]);
        
        DB::table('regions')->insert([
            'name' => 'Quebec',
        ]);
        
        DB::table('regions')->insert([
            'name' => 'Alberta',
        ]);
    }
}
