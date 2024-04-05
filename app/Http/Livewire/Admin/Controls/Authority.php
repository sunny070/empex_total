<?php

namespace App\Http\Livewire\Admin\Controls;

use App\Models\District;
use App\Models\RegisteringAuthority;
use App\Models\RegisteringAuthorityDistrict;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Authority extends Component
{
    use WithFileUploads;

    public $dleoName, $signature;
    public $authorityId;
    public $addAuthorityModal = false;
    public $editAuthorityModal = false;
    public $deleteAuthorityModal = false;
    public $district = [];
    public $name;
    public $alreadyDistricts = [];

    public function hydrate()
    {
        $this->emit('select2AutoInit');
        $this->alreadyDistricts = RegisteringAuthorityDistrict::pluck('district_id');
    }

    public function render()
    {
        // $trachCat = RegisteringAuthority::onlyTrashed()->latest()->paginate(3);
        return view('livewire.admin.controls.authority', [
            'authorities' => RegisteringAuthority::with('district')
                ->when($this->name, fn ($q) => $q->where('name', 'like', '%' . $this->name . '%'))
                ->paginate('10'),
                'deletedAuthorities' => RegisteringAuthority::with('district')
            ->when($this->name, fn ($q) => $q->where('name', 'like', '%' . $this->name . '%'))
            ->onlyTrashed() // Only soft-deleted records
            ->paginate(10),
            'districts' => District::orderBy('name', 'ASC')->get(),
            // 'districts' => District::orderBy('name', 'ASC')->whereNotIn('id', $this->alreadyDistricts)->get(),
            // 'trash'=> RegisteringAuthority::onlyTrashed()->latest()->paginate(3)
            
        ]);
    }

    public function launchAddModal()
    {
        $this->reset([
            'dleoName',
            'signature',
            'district'
        ]);

        $this->addAuthorityModal = true;
    }

    public function addAuthority()
    {
        $this->validate([
            'dleoName' => 'required',
            'signature' => 'required|image|max:2048',
            'district' => 'required',
        ]);

        $regd = new RegisteringAuthority();
        $regd->name = $this->dleoName;
        $regd->signature = $this->signature->storePublicly('authority_signature', 'public');
        $regd->save();

        foreach ($this->district as $dist) {
            $da = new RegisteringAuthorityDistrict();
            $da->registering_authority_id = $regd->id;
            $da->district_id = $dist;
            $da->save();
        }

        $this->addAuthorityModal = false;
    }

    public function openDeleteDialog($id)
    {
        $this->deleteAuthorityModal = true;
        $this->authorityId = $id;
    }

    public function closeDeleteDialog()
    {
        $this->deleteAuthorityModal = false;
    }
    // public function SoftDelete($id){
    //     $delete = RegisteringAuthority::find($id)->delete();
    //     // dd($delete);
    //     return Redirect()->back()->with('success','Category Soft Deleted Successfully');
    // }

    public function deleteAuthority()
    {   
        // as its a soft delete it also deletes the RegisteringAuthorityDistrict so better to comment
        RegisteringAuthorityDistrict::where('registering_authority_id', $this->authorityId)->delete();

        $authority = RegisteringAuthority::where('id', $this->authorityId)->first();
        Storage::disk('public')->delete($authority->signature);
        $authority->delete();

        $this->deleteAuthorityModal = false;
    }


    public function Restore($id){
        $restore = RegisteringAuthority::withTrashed()->find($id)->restore();
        
        
        return Redirect()->back()->with('success','Category Restored Successfully');

    }
}
