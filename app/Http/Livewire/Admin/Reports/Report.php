<?php

namespace App\Http\Livewire\Admin\Reports;

use DateTime;
use Livewire\Component;
use App\Models\District;
use App\Models\BasicInfo;
use Livewire\WithPagination;
use App\Models\Qualification;
use App\Models\PhysicalChallenge;
use Maatwebsite\Excel\Facades\Excel;
// use Livewire\Component;
use App\Models\UserPhysicalChallenge;
use App\Models\EducationQualification;

class Report extends Component
{    use WithPagination;

    public $category = 'all';
    public $district = 'all';
    public $duration = 'monthly';

    public function render()
    {
        // Retrieve districts
        $districts = District::all();
        // Build query based on filter criteria
        $query = BasicInfo::query()
            ->with(['education', 'district']) // Eager load relationships
            ->when($this->category !== 'all', function ($query) {
                $query->where('physically_challenge', $this->category);
            })
            ->when($this->district !== 'all', function ($query) {
                $query->whereHas('district', function ($q) {
                    $q->where('name', $this->district);
                });
            })
            ->when($this->duration === 'monthly', function ($query) {
                $query->whereMonth('created_at', now()->month);
            })->where('status','Approved')
            ->where('is_archive', 0);

        // Retrieve paginated data
        $data = $query->paginate(10);

        return view('livewire.admin.reports.report', compact('data','districts'));
    }
    
    // public function render()
    // {

    //     return view('livewire.admin.reports.report');
    // }
}
