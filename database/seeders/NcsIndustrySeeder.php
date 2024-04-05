<?php

namespace Database\Seeders;

use App\Models\NcsIndustry;
use Illuminate\Database\Seeder;

class NcsIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            [ 'name' => 'Other Service Activities (including Placement and Employment Agencies)'],
            [ 'name' => 'Agriculture, Forestry And Fishing'],
            [ 'name' => 'Mining And Quarrying'],
            [ 'name' => 'Manufacturing'],
            [ 'name' => 'Electricity, Gas, Steam And Air Conditioning Supply'],
            [ 'name' => 'Water Supply; Sewerage, Waste Management And Remediation Activities'],
            [ 'name' => 'Construction'],
            [ 'name' => 'Wholesale And Retail Trade; Repair Of Motor Vehicles And Motorcycles'],
            [ 'name' => 'Transportation And Storage'],
            [ 'name' => 'Accommodation And Food Service Activities'],
            [ 'name' => 'Information And Communication'],
            [ 'name' => 'Financial And Insurance Activities'],
            [ 'name' => 'Real Estate Activities'],
            [ 'name' => 'Professional, Scientific And Technical Activities'],
            [ 'name' => 'Administrative And Support Service Activities'],
            [ 'name' => 'Public Administration And Defence; Compulsory Social Security'],
            [ 'name' => 'Education'],
            [ 'name' => 'Human Health And Social Work Activities'],
            [ 'name' => 'Arts, Entertainment And Recreation'],
            [ 'name' => 'Activities Of Households As Employers; Undifferentiated Goods- And Services Producing Activities Of Households For Own Use'],
            [ 'name' => 'Activities Of Extraterritorial Organizations And Bodies'],
            [ 'name' => 'Unorganised Sector'],
            [ 'name' => 'BPO & IT'],
            [ 'name' => 'Indian Armed Forces'],
            [ 'name' => 'Travel and Tourism'],
            [ 'name' => 'Chemical Industry and Pharma'],
            [ 'name' => 'Central Armed Police Force'],
            [ 'name' => 'Sales and Retails'],
        ];

        foreach ($industries as $industry) {
            NcsIndustry::create($industry);
        }
    }
}
