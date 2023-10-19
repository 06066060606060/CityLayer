<?php

namespace Database\Seeders;
use App\Feeling;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeelingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feeling_list = [
            ['name' => 'Superb, exceptional', 'star' => 5, 'image' => '/img/comfortable.png'],
            ['name' => 'Good, enjoyable', 'star' => 4, 'image' => '/img/confused.png'],
            ['name' => 'Average, fair', 'star' => 3, 'image' => '/img/sad.png'],
            ['name' => 'Unpleasant, subpar', 'star' => 2, 'image' => '/img/happy.png'],
            ['name' => 'Unsatisfactory, intolerable', 'star' => 1, 'image' => '/img/disgusted.png'],
        ];

        \DB::table('feelings')->insert($feeling_list);
    }
}
