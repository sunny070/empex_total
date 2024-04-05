<?php

namespace Database\Seeders;

use App\Models\NcsSector;
use Illuminate\Database\Seeder;

class NcsSectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = [
            
            ['name' => 'Private'],
            ['name' => 'Central Government'],
            ['name' => 'State Government'],
            ['name' => 'Central PSU'],
            ['name' => 'State PSU'],
            ['name' => 'Local Bodies'],
            ['name' => 'Autonomous'],
            [ 'name' => 'Company'],
            [ 'name' => 'NGO'],
            [ 'name' => 'Partnership'],
            [ 'name' => 'Proprietorship'],
            [ 'name' => 'Others'],
        ];

        foreach ($sectors as $sector) {
            NcsSector::create($sector);
        }
    }
}
