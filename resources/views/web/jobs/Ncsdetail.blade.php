@extends('layouts.web.app')

@section('title', $job->title)

@section('navbar')
@parent
@endsection

@section('content')
<div class="mx-auto my-10 max-w-7xl md:px-4">
  <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
    <div class="w-full col-span-2 mb-5 overflow-hidden md:bg-white md:rounded-lg md:shadow md:border md:mb-0">
      <div class="px-6 py-4">
        <a href="{{ route('web.jobsNcs') }}" class="text-empex-green">
          <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Back to List 
        </a>
       {{-- <a href="{{$job->url}}" target="blank" class="px-7 text-empex-green">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
          </svg>
          
          
          
          Link to Apply
        </a> --}}
    
        





        
        <div class="mt-5">
          <div class="pt-6 font-semibold">
            {{ $job->JobTitle }}
          </div>

          <div class="pt-6 mt-3 text-sm text-gray-400">
            <span class="pr-2 mr-2 border-r-2 md:pr-5 md:mr-5">{{ $job->NumberofOpenings }}
              post</span>
            <span><span class="hidden md:inline">Due
                date:</span> {{ date('d',
              strtotime($job->JobPostExpiryDate)) }}<sup>{{ date('S',
                strtotime($job->JobPostExpiryDate)) }}</sup>{{ date(' M Y',
              strtotime($job->JobPostExpiryDate)) }}</span>
          </div>

          <div class="mt-3 text-base text-gray-600">
            {!! $job->JobDescription !!}
          </div>

          <div class="my-2 font-semibold text-gray-400">Share Now   </div>
          {!! Share::page(request()->url(), $job->JobTitle, ['class' => 'text-empex-green text-2xl
          mx-2'])->telegram()->facebook()->linkedin()->twitter()->whatsapp() !!}

          {{-- <div class="flex justify-center">
          <div class="text-gray-400 font-semibold my-2">Share Now   </div>
          {!! Share::page(request()->url(), $job->title, ['class' => 'text-empex-green text-2xl
          mx-2'])->telegram()->facebook()->linkedin()->twitter()->whatsapp() !!}
          <div class="flex justify-center">
          <a href="{{$job->url}}" target="blank" class="px-7 text-empex-green">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
            </svg>
            Link to Apply
          </a>
        </div> --}}
          {{-- @if (count($job->attachments) > 0)
          <div class="mt-5">
            <div class="mb-3 font-medium text-gray-800">Attached File</div>
            @foreach ($job->attachments as $file)
            <div class="flex justify-between mb-2 break-words">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5 text-empex-green" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
                <span>{{ $file->file_name }}</span>
              </span>
              <span>
                <span>{{ $file->file_size }}</span>
                <a href="{{ asset('storage/'. $file->file) }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5 text-empex-green" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
                </a>
              </span>
            </div>
            @endforeach
          </div>
          @endif --}}
        </div>
        
        
      
        
      </div>
    </div>
    <div>
      <div
        class="w-full overflow-hidden border-t border-empex-yellow md:bg-white md:rounded-lg md:shadow md:border md:border-gray-200"
        style="height: max-content">
        <div class="px-6 py-4 ">
          <div class="flex justify-center font-semibold text-empex-green">Employer</div>
          <div class="grid grid-cols-2 gap-2 pt-2 md:grid-cols-3">
            <div class="font-semibold ">Industry:</div>
            <div class="px-8 md:col-span-2">{{ $job->industries->name }}</div>
          </div>
          <div class="grid grid-cols-2 gap-2 pt-2 md:grid-cols-3">
            <div class="font-semibold ">Sector:</div>
            
            <div class="px-8 md:col-span-2">{{ $job->sectors->name ??"" }} {{ $job->Type->name??"" }}</div>
          </div>
          <div class="grid grid-cols-2 gap-2 pt-2 md:grid-cols-3">
            <div class="font-semibold ">Type:</div>
            <div class="px-8 md:col-span-2">{{ $job->jobNature->name??"" }}</div>
          </div>
          <div class="grid grid-cols-2 gap-2 pt-2 md:grid-cols-3">
            <div class="font-semibold ">Department:</div>
            <div class="px-8 md:col-span-2">{{ $job->ContactPersonName }}</div>
          </div>
        </div>
      </div>




      <div
        class="w-full overflow-hidden border-t border-empex-yellow md:bg-white md:rounded-lg md:shadow md:border md:border-gray-200"
        style="height: max-content">
        <div class="px-6 py-4 ">
          <div class="flex justify-center font-semibold text-empex-green">Salary</div>
          
          <div class="grid grid-cols-2 gap-2 pt-2 md:grid-cols-3">
            <div class="w-[500px] font-semibold">Minimum Salary:</div>
            <div class="px-16 md:col-span-2"> ₹ {{ $job->MinExpectedSalary }}</div>
          </div>
          
          <div class="grid grid-cols-2 gap-2 pt-2 md:grid-cols-3">
            <div class="w-[500px] font-semibold">Maximum Salary:</div>
            <div class="px-16 md:col-span-2">₹ {{ $job->MaxExpectedSalary }}</div>
          </div>
        </div>
      </div>





      <div
        class="w-full pt-2 overflow-hidden border-t border-empex-yellow md:bg-white md:rounded-lg md:shadow md:border md:border-gray-200"
        style="height: max-content">
        <div class="px-6 py-4 ">
          <div class="flex justify-center font-semibold text-empex-green">Details</div>
          <div class="flex justify-between">
            <div class="w-[500px] font-semibold">Name:</div>
            <div class="px-16 md:col-span-2">{{ $job->ContactPersonName }}</div>
          </div>
          <div class="flex justify-between">
            <div class="w-[500px] font-semibold">Phone Number:</div>
            <div class="px-16 md:col-span-2">{{ $job->ContactMobile }}</div>
          </div>
          <div class="flex justify-between">
            <div class="w-[5vw] font-semibold">Email:</div>
            <div class="md:col-span-2">{{ $job->ContactEmail }}</div>
          </div>
          
        </div>
      </div>
      {{-- <div
        class="w-full overflow-hidden border-t md:mt-3 border-empex-yellow md:bg-white md:rounded-lg md:shadow md:border md:border-gray-200"
        style="height: max-content">
        <div class="px-6 py-4 ">
          <div class="font-semibold">Viewed Posts</div>
          @livewire('web.job.viewed-job-ncs') 
        </div>
      </div> --}}
    </div>
  </div>
</div>
@endsection

@section('footer')
@parent
@endsection

@section('copyright')
@parent
@endsection
