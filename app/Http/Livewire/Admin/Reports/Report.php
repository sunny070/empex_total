<?php

namespace App\Http\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\BasicInfo;
use App\Models\District;
use App\Models\EducationQualification;
use App\Models\PhysicalChallenge;
use App\Models\Qualification;
use App\Models\UserPhysicalChallenge;
use DateTime;
// use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Component
{
    public $category = 'All';
    public $districts;
    public $district = 'All';
    public $districtName;
    public $duration = 'Monthly';
    public $year = '2022';
    public $month;
    public $quarter = '01';
    public $half = '01';
    public $from;
    public $to;
    public $reports;
    public $years = [];
    public $totalMaleGender;
    public $totalFemaleGender;
    public $totalOtherGender;
    public $monthName = 'January';
    public $generated;
    public $buttonEnable;
    public $educations;



    public function generateReport()
    {
        if ($this->month == '1') {
            $this->monthName = 'January';
        } elseif ($this->month == '2') {
            $this->monthName = 'February';
        } elseif ($this->month == '3') {
            $this->monthName = 'March';
        } elseif ($this->month == '4') {
            $this->monthName = 'April';
        } elseif ($this->month == '5') {
            $this->monthName = 'May';
        } elseif ($this->month == '6') {
            $this->monthName = 'June';
        } elseif ($this->month == '7') {
            $this->monthName = 'July';
        } elseif ($this->month == '8') {
            $this->monthName = 'August';
        } elseif ($this->month == '9') {
            $this->monthName = 'September';
        } elseif ($this->month == '10') {
            $this->monthName = 'October';
        } elseif ($this->month == '11') {
            $this->monthName = 'November';
        } else {
            $this->monthName = 'December';
        }

        $this->districtName = $this->district != 'All' ? strtoupper(District::where('id', $this->district)->value('name')) : strtoupper($this->district);
        switch ($this->category) {
            case 'Education':
                $this->generateEducationReport();
                break;
            case 'All':
                $this->generateAllReport();
                break;
            case 'Physically Handicapped':
                $this->generateHandicappedReport();
                break;
            default:
                $this->generateCastReport($this->category);
        }

        // $this->generateCastReport($this->category);
        $this->generated = true;
        $this->buttonEnable = false;
    }

    public function generateEducationReport()
    {
        $this->totalFemaleGender = BasicInfo::where('canEdit', 0)->where('status', 'Approved')->where('gender', 'Female')->count();
        $this->totalOtherGender = BasicInfo::where('canEdit', 0)->where('status', 'Approved')->where('gender', 'Others')->count();
    }
    
    public function render()
    {   
        $this->educations = Qualification::with('subject')->get()->toArray();

        $totalMaleGender = BasicInfo::where('canEdit', 0)->where('status', 'Approved')->where('gender', 'Male')->count();
        $this->districts = District::orderBy('name', 'ASC')->get();
        $this->reports = collect();
        $this->year = now()->year;

        // get year from 2020 till current year
        for ($i = '2020'; $i <= date('Y'); $i++) {
            $this->years[] = $i;
        }
        $this->years = array_reverse($this->years);

        $this->from = date('Y-m-d');
        $date = new DateTime('+1 day');
        $this->to =  $date->format('Y-m-d');
        $this->month = date('m');
        return view('livewire.admin.reports.report',compact('totalMaleGender'));
    }
}
