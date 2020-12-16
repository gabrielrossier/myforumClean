<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Censuré',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Clos',
            ),
            2 => 
            array (
                'id' => 1,
                'name' => 'En discussion',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Proposé',
            ),
            4 => 
            array (
                'id' => 2,
                'name' => 'Publié',
            ),
        ));
        
        
    }
}