<?php

namespace Database\Seeders;

use App\Models\NcsMinQualification;
use Illuminate\Database\Seeder;

class NcsMinQualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualifications = [
            ['id'=>1,'name' => 'Upto 9th', 'EducationGroup' => 1, 'EducationLevel' => 2],
            ['id'=>2,'name' => '10th', 'EducationGroup' => 2, 'EducationLevel' => 3],
            // [''id'=>1,name' => '11th', 'EducationGroup' => 2, 'EducationLevel' => 4],
            ['id'=>4,'name' => '12th', 'EducationGroup' => 2, 'EducationLevel' => 5],
            ['id'=>5,'name' => 'Diploma After 10th', 'EducationGroup' => 2, 'EducationLevel' => 6],
            ['id'=>6,'name' => 'Diploma After 12th', 'EducationGroup' => 2, 'EducationLevel' => 7],
            ['id'=>7,'name' => 'Graduate', 'EducationGroup' => 2, 'EducationLevel' => 8],
            ['id'=>8,'name' => 'Post Graduate', 'EducationGroup' => 2, 'EducationLevel' => 10],
            ['id'=>9,'name' => 'Phd', 'EducationGroup' => 2, 'EducationLevel' => 11],
            // ['id'=>11,'name' => 'No Schooling', 'EducationGroup' => 0, 'EducationLevel' => 0],
            ['id'=>11,'name' => 'ITI', 'EducationGroup' => 2, 'EducationLevel' => 6],
            ['id'=>12,'name' => 'PG Diploma', 'EducationGroup' => 2, 'EducationLevel' => 9],
            // ['id'=>15,'name' => 'Upto 8th', 'EducationGroup' => 1, 'EducationLevel' => 1],
        ];

        foreach ($qualifications as $qualification) {
            NcsMinQualification::create($qualification);
        }
    }
}
