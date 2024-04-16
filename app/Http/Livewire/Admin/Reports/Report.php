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
use App\Exports\TotalReportExport;
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
        $query = BasicInfo::query()->with(['education', 'district', 'userPhysicalChallenge']);

        // Modify query based on filter criteria
        if ($this->category !== 'all') {
            if ($this->category === 'Physically Challenge') {
                // If 'Physically Challenge' is selected, retrieve data related to physically challenged users
                $query->where('physically_challenge', 1);
            } elseif ($this->category === 'Mizo') {
                // Filter based on the category attribute for 'Mizo' society
                $query->where('society', $this->category);
            } elseif ($this->category === 'Non-Mizo') {
                // Filter based on the category attribute for 'Non-Mizo' society
                $query->where('society', '!=', 'Mizo');
            } else {
                // For other cases, filter based on the selected category
                $query->where('society', $this->category);
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
// dd($data);



        return view('livewire.admin.reports.report', compact('data', 'districts',));
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


    public function exportToExcel()
    {
        $data = $this->prepareData(); // Assuming you have a method to prepare the data

        // Export data to Excel using Laravel Excel
        return Excel::download(new TotalReportExport($data), 'report.xlsx');
    }
    private function prepareData()
    {
        // Build the query to retrieve the data based on the current filters
        $query = BasicInfo::query()
            ->with(['education', 'userPhysicalChallenge'])
            ->where('status', 'Approved')
            ->where('is_archive', 0);
    
        // Apply category filter
        if ($this->category !== 'all') {
            if ($this->category === 'Physically Challenge') {
                $query->where('physically_challenge', 1);
            } elseif ($this->category === 'Mizo') {
                $query->where('society', $this->category);
            } elseif ($this->category === 'Non-Mizo') {
                $query->where('society', '!=', 'Mizo');
            } else {
                $query->where('society', $this->category);
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
    
        // Retrieve the paginated data
        $data = $query->get();
    
        // Prepare data for export
        $preparedData = collect();
    
        foreach ($data as $index => $info) {
            $rowData = [
                'Serial Number' => $index + 1,
                'Name' => $info->full_name,
                'Category' => '',
                'Qualification' => '',
                'Gender' => $info->gender,
                'User ID' => $info->user_id,
            ];
    
            // Prepare Category
            $categories = [];
            foreach ($info->userPhysicalChallenge as $userPhysicalChallenge) {
                if ($userPhysicalChallenge->physicalChallenge) {
                    $categories[] = $userPhysicalChallenge->physicalChallenge->name;
                } else {
                    $categories[] = 'Not Mentioned';
                }
            }
            $rowData['Category'] = implode(', ', $categories);
    
            // Prepare Qualification
            $qualifications = [];
            if ($info->education) {
                foreach ($info->education as $education) {
                    if ($education->qualification) {
                        $qualifications[] = $education->qualification->name;
                    }
                }
            }
            $rowData['Qualification'] = implode(', ', $qualifications);
    
            // Add the prepared row to the collection
            $preparedData->push($rowData);
        }
    
        return $preparedData;
    }
    // public function render()
    // {

    //     return view('livewire.admin.reports.report');
    // }
}
