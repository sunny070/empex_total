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
    // public $reports;
    public $years = [];
    public $totalMaleGender;
    public $totalFemaleGender;
    public $totalOtherGender;
    public $monthName = 'January';
    public $generated;
    public $buttonEnable;
    public $educations;
    
    
    public $society;



    public $reports = [];
    public $maleReport = 0;
    public $femaleReport = 0;
    public $totalReport = 0;
    public $maleLapsed = 0;
    public $femaleLapsed = 0;
    public $totalLapsed = 0;
    public $malePlaced = 0;
    public $femalePlaced = 0;
    public $totalPlaced = 0;
    public $maleLiveRegister = 0;
    public $femaleLiveRegister = 0;
    public $totalLiveRegister = 0;


     // below are for all category reports
     public $allMizo = [];
     public $maleReportMizo = 0;
     public $femaleReportMizo = 0;
     public $totalReportMizo = 0;
     public $maleLapsedMizo = 0;
     public $femaleLapsedMizo = 0;
     public $totalLapsedMizo = 0;
     public $malePlacedMizo = 0;
     public $femalePlacedMizo = 0;
     public $totalPlacedMizo = 0;
     public $maleLiveRegisterMizo = 0;
     public $femaleLiveRegisterMizo = 0;
     public $totalLiveRegisterMizo = 0;
 
     public $allNonMizo = [];
     public $maleReportNonMizo = 0;
     public $femaleReportNonMizo = 0;
     public $totalReportNonMizo = 0;
     public $maleLapsedNonMizo = 0;
     public $femaleLapsedNonMizo = 0;
     public $totalLapsedNonMizo = 0;
     public $malePlacedNonMizo = 0;
     public $femalePlacedNonMizo = 0;
     public $totalPlacedNonMizo = 0;
     public $maleLiveRegisterNonMizo = 0;
     public $femaleLiveRegisterNonMizo = 0;
     public $totalLiveRegisterNonMizo = 0;
 
     public $allPhysical = [];
     public $maleReportPhysical = 0;
     public $femaleReportPhysical = 0;
     public $totalReportPhysical = 0;
     public $maleLapsedPhysical = 0;
     public $femaleLapsedPhysical = 0;
     public $totalLapsedPhysical = 0;
     public $malePlacedPhysical = 0;
     public $femalePlacedPhysical = 0;
     public $totalPlacedPhysical = 0;
     public $maleLiveRegisterPhysical = 0;
     public $femaleLiveRegisterPhysical = 0;
     public $totalLiveRegisterPhysical = 0;



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

    public function generateCastReport($society)
    {
        // $userQualificationIds = EducationQualification::select('user_id', 'qualification_id')
        //     ->distinct('user_id')->orderBy('asc')
        //     ->get()
        //     ->pluck('qualification_id', 'user_id');
        //     dd($userQualificationIds);
        // $totalMaleGender = BasicInfo::where('canEdit', 0)->where('status', 'Approved')->where('gender', 'Male')->count();
        // $this->totalFemaleGender = BasicInfo::where('canEdit', 0)->where('status', 'Approved')->where('gender', 'Female')->count();
        // $this->totalOtherGender = BasicInfo::where('canEdit', 0)->where('status', 'Approved')->where('gender', 'Others')->count();

        if ($this->category == 'All' && $society == 'Mizo') {
            $allMizo = [];
            $this->maleReportMizo = 0;
            $this->femaleReportMizo = 0;
            $this->totalReportMizo = 0;
            $this->maleLapsedMizo = 0;
            $this->femaleLapsedMizo = 0;
            $this->totalLapsedMizo = 0;
            $this->malePlacedMizo = 0;
            $this->femalePlacedMizo = 0;
            $this->totalPlacedMizo = 0;
            $this->maleLiveRegisterMizo = 0;
            $this->femaleLiveRegisterMizo = 0;
            $this->totalLiveRegisterMizo = 0;
        } elseif ($this->category == 'All' && $society == 'Non-Mizo') {
            $allNonMizo = [];
            $this->maleReportNonMizo = 0;
            $this->femaleReportNonMizo = 0;
            $this->totalReportNonMizo = 0;
            $this->maleLapsedNonMizo = 0;
            $this->femaleLapsedNonMizo = 0;
            $this->totalLapsedNonMizo = 0;
            $this->malePlacedNonMizo = 0;
            $this->femalePlacedNonMizo = 0;
            $this->totalPlacedNonMizo = 0;
            $this->maleLiveRegisterNonMizo = 0;
            $this->femaleLiveRegisterNonMizo = 0;
            $this->totalLiveRegisterNonMizo = 0;
        } else {
            $this->maleReport = 0;
            $this->femaleReport = 0;
            $this->totalReport = 0;
            $this->maleLapsed = 0;
            $this->femaleLapsed = 0;
            $this->totalLapsed = 0;
            $this->malePlaced = 0;
            $this->femalePlaced = 0;
            $this->totalPlaced = 0;
            $this->maleLiveRegister = 0;
            $this->femaleLiveRegister = 0;
            $this->totalLiveRegister = 0;
            $reports = [];
        }

        // $qualificationRanks = [
        //     'Unskill/Cl. I-V',
        //     'Cl. VI-IX',
        //     'HSLC',
        //     'HSSLC',
        //     'Hindi',
        //     'Diploma & Other Qualifications',
        //     'Graduate',
        //     'Post Graduate',
        // ];
        
        // // Initialize an array to store the highest qualification for each user
        // $highestQualifications = [];
        
        // $userQualificationIds = EducationQualification::select('user_id', 'qualification_id')
        //     ->get()
        //     ->pluck('qualification_id', 'user_id');
        
        // // Iterate through user qualification IDs to find the highest qualification
        // foreach ($userQualificationIds as $userId => $qualificationId) {
        //     // Retrieve the qualification name associated with the current qualification ID
        //     $qualificationName = Qualification::find($qualificationId)->name;
        
        //     // Find the highest qualification based on the rank order
        //     if (in_array($qualificationName, $qualificationRanks)) {
        //         $currentHighest = $highestQualifications[$userId] ?? null;
        //         $currentRank = array_search($currentHighest, $qualificationRanks);
        //         $newRank = array_search($qualificationName, $qualificationRanks);
        
        //         if ($currentRank === null || $newRank > $currentRank) {
        //             $highestQualifications[$userId] = $qualificationName;
        //         }
        //     }
        //     // dd($highestQualifications);
            
        // }
        $qualifications = Qualification::get();
        foreach ($qualifications as $quali){
            $userQualificationIds = EducationQualification::where('qualification_id', $quali->id)->
            pluck('user_id')->unique();
        
        $maleInReport = BasicInfo::whereIn('user_id', $userQualificationIds)
                ->where('status', 'Approved')
                ->where('is_archive', 0)
                ->where('card_valid_till', '>=', now())
                ->where('society', $society)
                ->when($this->district != 'All', function ($q) {
                    return $q->where('district_id', $this->district);
                })
                ->when($this->duration == 'Yearly', function ($q) {
                    $q->where('created_at', 'LIKE', $this->year . '%');
                })
                ->when($this->duration == 'Monthly', function ($q) {
                    $q->where('created_at', 'LIKE', date('Y-m', strtotime($this->year . '-' . $this->month)) . '%');
                })
                ->when($this->duration == 'Custom', function ($q) {
                    $q->where('created_at', '>=', date('Y-m-d', strtotime($this->from)))->where('created_at', '<=', date('Y-m-d', strtotime($this->to)));
                })
                ->when($this->duration == 'Half-Yearly', function ($q) {
                    $from = date('Y-m-d', strtotime($this->year . '-' . ($this->half == '01' ? 1 : 7) . '-1'));
                    $to = date('Y-m-d', strtotime($this->year . '-' . ($this->half == '01' ? 6 : 12) . '-31'));
                    $q->where('created_at', '>=', date('Y-m-d', strtotime($from)))->where('created_at', '<=', date('Y-m-d', strtotime($to)));
                })
                ->when($this->duration == 'Quarterly', function ($q) {
                    switch ($this->quarter) {
                        case '01':
                            $from = date('Y-m-d', strtotime($this->year . '-' . 1 . '-' . 1));
                            $to = date('Y-m-d', strtotime($this->year . '-' . 3 . '-' . 30));
                            break;
                        case '02':
                            $from = date('Y-m-d', strtotime($this->year . '-' . 4 . '-' . 1));
                            $to = date('Y-m-d', strtotime($this->year . '-' . 6 . '-' . 31));
                            break;
                        case '03':
                            $from = date('Y-m-d', strtotime($this->year . '-' . 7 . '-' . 1));
                            $to = date('Y-m-d', strtotime($this->year . '-' . 9 . '-' .  31));
                            break;
                        default:
                            $from = date('Y-m-d', strtotime($this->year . '-' .  10 . '-' .  1));
                            $to = date('Y-m-d', strtotime($this->year . '-' . 12  . '-' . 31));
                            break;
                    }
                    $q->where('created_at', '>=', date('Y-m-d', strtotime($from)))->where('created_at', '<=', date('Y-m-d', strtotime($to)));
                })
                ->where('gender', 'Male')
                ->count();
                // dd($maleInReport);



                if ($this->category == 'All' && $society == 'Mizo') {
                    $this->maleReportMizo += $maleInReport;
    
                    array_push($allMizo, [
                        // 'category' => $quali->name,
                        'maleReport' => $maleInReport,
                        
                    ]);
                } elseif ($this->category == 'All' && $society == 'Non-Mizo') {
                    $this->maleReportNonMizo += $maleInReport;
                    
                    array_push($allNonMizo, [
                        // 'category' => $quali->name,
                        'maleReport' => $maleInReport,
                        
                    ]);
                } else {
                    $this->maleReport += $maleInReport;
                   
    
                    array_push($reports, [
                        // 'category' => $quali->name,
                        'maleReport' => $maleInReport,
                        
                    ]);
                }
                if ($this->category == 'All' && $society == 'Mizo') {
                    $this->allMizo = $allMizo;
                    $this->totalReportMizo = $this->maleReportMizo + $this->femaleReportMizo;
                    $this->totalLapsedMizo = $this->maleLapsedMizo + $this->femaleLapsedMizo;
                    $this->totalPlacedMizo = $this->malePlacedMizo + $this->femalePlacedMizo;
                    $this->totalLiveRegisterMizo = $this->maleLiveRegisterMizo + $this->femaleLiveRegisterMizo;
                } elseif ($this->category == 'All' && $society == 'Non-Mizo') {
                    $this->allNonMizo = $allNonMizo;
                    $this->totalReportNonMizo = $this->maleReportNonMizo + $this->femaleReportNonMizo;
                    $this->totalLapsedNonMizo = $this->maleLapsedNonMizo + $this->femaleLapsedNonMizo;
                    $this->totalPlacedNonMizo = $this->malePlacedNonMizo + $this->femalePlacedNonMizo;
                    $this->totalLiveRegisterNonMizo = $this->maleLiveRegisterNonMizo + $this->femaleLiveRegisterNonMizo;
                } else {
                    $this->reports = $reports;
                    $this->totalReport = $this->maleReport + $this->femaleReport;
                    $this->totalLapsed = $this->maleLapsed + $this->femaleLapsed;
                    $this->totalPlaced = $this->malePlaced + $this->femalePlaced;
                    $this->totalLiveRegister = $this->maleLiveRegister + $this->femaleLiveRegister;
                }
        
            }
    // Now $highestQualifications contains the highest education qualification for each user
            // dd($userQualificationIds);

    }

    public function render()
    {

        
        $this->educations = Qualification::with('subject')->get()->toArray();



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
        return view('livewire.admin.reports.report');
    }
}
