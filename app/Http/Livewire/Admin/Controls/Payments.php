<?php

namespace App\Http\Livewire\Admin\Controls;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class Payments extends Component
{
    use WithPagination;
    public $search = '';
    public $orderBy ='id';
    public $orderAsc =true;
    public $perPage = 0;
    public $status='';
    // public $date="";
    public $startDate = '';
    public $endDate = '';
    protected $listeners = ['refreshLivewire' => '$refresh'];

    protected $queryString = ['search', 'orderBy', 'orderAsc', 'perPage', 'status', 'startDate', 'endDate'];

public function render()
{
    $query = Payment::searchPost($this->search)
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc');

    if ($this->startDate && $this->endDate) {
        $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
    }

    if ($this->status) {
        $query->where('status', $this->status);
    }

    $payments = $query->paginate($this->perPage);

    // Use map to format created_at after paginating
    $payments->getCollection()->transform(function ($payment) {
        $payment->formatted_created_at = $payment->created_at->format('d M Y H:i:s');
        return $payment;
    });

    return view('livewire.admin.controls.payments', compact('payments'));
}


public function mount()
{
    // Set default values for all properties
    $this->search = '';
    $this->orderBy = 'id';
    $this->orderAsc = true;
    $this->perPage = 0;
    $this->status = '';
    $this->startDate = '';
    $this->endDate = '';
    
     // Trigger Livewire refresh
     $this->emit('refreshLivewire');
}


}

