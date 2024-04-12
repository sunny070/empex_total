<?php

namespace App\Http\Livewire\Admin\Reports;

use DateTime;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\District;
use App\Models\BasicInfo;
use Livewire\WithPagination;
use App\Models\Qualification;
use App\Models\PhysicalChallenge;
// use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\UserPhysicalChallenge;
use App\Models\EducationQualification;

class Report extends Component
{
    use WithPagination;

    // use WithPagination;

    public $category = 'all';
    public $district = 'all';
    public $duration = 'monthly';
    public $selectedYear;
    public $years;
    public $from;
    public $to;
    public $month;
    public $generated = false; // Flag to indicate if report is generated
    public $buttonEnable = true; // Flag to control button visibility
    public $data;
    public $physicallyChallengedUsers=[];

//     public function generateReport()
//     {
//         switch ($this->category) {
//             case 'Education':
//                 $this->generateEducationReport();
//                 break;
//             case 'All':
//                 $this->generateAllReport();
//                 break;
//             case 'Physically Handicapped':
//                 $this->generateHandicappedReport();
//                 break;
//             default:
//                 $this->generateCastReport($this->category);
//         }
//     }
//   private function generateHandicappedReport()
//     {
//         // Logic to generate physically handicapped report
        
//          // Retrieve districts
//     $districts = District::all();

//     // Initialize query builder
//     $query = BasicInfo::query()->with(['education', 'district']);

//     // Modify query based on filter criteria
//     if ($this->category !== 'all') {
//         if ($this->category === 'Physically Handicapped') {
//             $query->whereIn('user_id', function ($subquery) {
//                 $subquery->select('user_id')->from('physical_challenges');
//             });
//         } else {
//             $query->where('physically_challenge', $this->category);
//         }
//     }

//     // Apply district filter
//     if ($this->district !== 'all') {
//         $query->whereHas('district', function ($q) {
//             $q->where('name', $this->district);
//         });
//     }

//     // Apply duration filter
//     if ($this->duration === 'monthly') {
//         $query->whereMonth('created_at', $this->month);
//     } elseif ($this->duration === 'yearly' && $this->selectedYear) {
//         $query->whereYear('created_at', $this->selectedYear);
//     }

//     // Add additional conditions
//     $query->where('status', 'Approved')->where('is_archive', 0);

//     // Retrieve paginated data
//     $this->data = $query->paginate(10);
//     // Retrieve physically challenged users separately if the category is 'Physically Handicapped'
    
//     if ($this->category === 'Physically Handicapped') {
//         $this->physicallyChallengedUsers = UserPhysicalChallenge::all();
//     }
//     }

    public function mount()
    {
        // Set the current year as default
        $this->selectedYear = now()->year;

        // Initialize years array from 2020 to current year
        $this->years = range(2020, now()->year);

        // Reverse the years array
        $this->years = array_reverse($this->years);

        // Set default values for $from, $to, and $month
        $this->from = now()->format('Y-m-d');
        $this->to = (new DateTime('+1 day'))->format('Y-m-d');
        $this->month = now()->format('m');
    }

    public function render()
    {
        // Retrieve districts
        $districts = District::all();

        // Initialize query builder
        $query = BasicInfo::query()->with(['education', 'district']);

        // Modify query based on filter criteria
        if ($this->category !== 'all') {
            if ($this->category === 'Physically Challenge') {
                $query->whereIn('user_id', function ($subquery) {
                    $subquery->select('user_id')->from('physical_challenges');
                });
            } else {
                $query->where('physically_challenge', $this->category);
            }
        }

        // Apply district filter
        if ($this->district !== 'all') {
            $query->whereHas('district', function ($q) {
                $q->where('name', $this->district);
            });
        }

        // Apply duration filter
        if ($this->duration === 'monthly') {
            $query->whereMonth('created_at', $this->month);
        } elseif ($this->duration === 'yearly' && $this->selectedYear) {
            $query->whereYear('created_at', $this->selectedYear);
        }

        // Add additional conditions
        $query->where('status', 'Approved')->where('is_archive', 0);

        // Retrieve paginated data
        $data = $query->paginate(10);

        // Retrieve physically challenged users separately if the category is 'Physically Challenge'
        $physicallyChallengedUsers = [];
        if ($this->category === 'Physically Challenge') {
            $physicallyChallengedUsers = UserPhysicalChallenge::all();
        }
        // dd($physicallyChallengedUsers)  ; 
        return view('livewire.admin.reports.report', compact('data', 'districts', 'physicallyChallengedUsers'));
    }

    public function resetFilters()
    {
        $this->reset(['category', 'district', 'duration', 'selectedYear', 'month']);
    }

    public function generateYears()
    {
        $this->years = array_reverse($this->years);
        $currentYear = Carbon::now()->year;
        return range($currentYear, $currentYear - 10, -1);
    }
    // public function render()
    // {

    //     return view('livewire.admin.reports.report');
    // }
}
