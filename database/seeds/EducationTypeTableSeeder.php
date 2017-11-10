<?php

use Illuminate\Database\Seeder;
use PIS\EducationType;

class EducationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educationType = [
            ['description' => 'ELEMENTARY'],
            ['description' => 'SECONDARY'],
            ['description' => 'VOCATIONAL/TRADE COURSE'],
            ['description' => 'COLLEGE'],
            ['description' => 'GRADUATE STUDIES']
        ];
        EducationType::insert($educationType);
    }
}
