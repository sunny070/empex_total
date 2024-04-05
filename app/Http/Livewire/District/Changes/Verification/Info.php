<?php

namespace App\Http\Livewire\District\Changes\Verification;

use App\Models\AdminDistrict;
use App\Models\ChangeBasicInfo;
use App\Models\District;
use Livewire\Component;

class Info extends Component
{
	public $districts;
	public $name;
	public $district;
	public $authDistricts;

	public function mount()
	{
		$this->authDistricts = AdminDistrict::where('admin_id', auth()->guard('admin')->id())->pluck('district_id')->toArray();
		$this->districts = District::whereIn('id', $this->authDistricts)->orderBy('name', 'ASC')->get();
	}

	public function render()
	{
		return view('livewire.district.changes.verification.info', [
			'basicInfo' => ChangeBasicInfo::where('status', 'Pending')
				->whereIn('user_district_id', $this->authDistricts)
				->when($this->district, fn ($q) => $q->where('user_district_id', $this->district))
				->when($this->name, fn ($q) => $q->where('full_name', 'like', '%' . $this->name . '%'))
				->with('district')
				->get()
		]);
	}
}
