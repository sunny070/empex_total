@extends('layouts.admin')
@section('content')
<div class="py-5">
  <div class="max-w-7xl mx-auto px-4">
    <h6 class="text-gray-600 dark:text-gray-200">
      Total Registration Report
    </h6>
    <div class="items-center justify-between py-4 space-y-2 sm:space-y-4 md:space-y-2 lg:space-y-0">
      @livewire('admin.reports.report')
    </div>
  </div>
</div>
@endsection