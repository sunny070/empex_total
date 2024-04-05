@extends('layouts.district.app')

@section('title', 'District Admin - Change Request')

@section('navbar')
@parent
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 my-10">
  <div class="w-full">
    <div class=" text-sm font-semibold ml-5 my-3">
      Change Request Detail
    </div>

    @if ($type == 'info')
    @livewire('district.changes.approval.detail.info', ['id' => $id])
    @elseif ($type == 'address')
    @livewire('district.changes.approval.detail.address', ['userId' => $id])
    @elseif ($type == 'education')
    @livewire('district.changes.approval.detail.education', ['userId' => $id])
    @elseif ($type == 'experience')
    @livewire('district.changes.approval.detail.experience', ['userId' => $id])
    @else
    @livewire('district.changes.approval.detail.transfer', ['id' => $id])
    @endif
  </div>
</div>
@endsection