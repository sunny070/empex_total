@extends('layouts.admin')
@section('content')

<div class="py-5">
  <div class="px-4 mx-auto max-w-7xl">
    <h6 class="font-semibold text-gray-600 dark:text-gray-200">Post New Job</h6>

    <div class="w-full py-4 space-y-2 lg:flex sm:space-y-4 md:space-y-2 lg:space-y-0">
      <div class="w-full p-5 bg-white border rounded">
        <div class="px-4 mx-auto max-w-7xl">
          @if(session('error'))


          
          {{-- <div class="alert alert-success">
            {{ session('success') }}
          </div> --}}
          {{-- @elseif(session('error')) --}}
          <div class="alert alert-success">
            {{ session('error') }}
          </div>
          @endif
          {{-- <h6 class="font-semibold text-gray-600 dark:text-gray-200">Post New Job</h6> --}}

          <form method="POST" action="{{ route('submitForm') }}">
            @csrf
            <input type="text" hidden name="JobReferenceID" id="JobReferenceID" value="{{ rand() }}" readonly>

            <!-- Job Title -->
            <label class="text-xs tracking-wide text-gray-500" for="JobTitle">Job Title*</label>
            <input
              class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
              type="text" name="JobTitle" placeholder="JobTitle">
            @error('JobTitle')
            <p class="text-xs italic text-red-500">{{ $message }}</p>
            @enderror

            <!-- Sector and Industry -->
            <div class="flex flex-col pb-4 sm:flex-row sm:space-x-4 sm:items-center">
              <select name="sector"
                class="w-full p-2 text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                id="sector">
                <option hidden value="">Select Sectors</option>
                @foreach ($sectors as $sector)
                <option value="{{ $sector->id }}"> {{ $sector->name }}</option>
                @endforeach
              </select>
              @error('sector')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror

              <select name="industry"
                class="w-full p-2 text-gray-600 border-gray-400 rounded ptext-base w- input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                id="industry">
                <option hidden value="">Select Industry</option>
                @foreach ($indusrties as $industry)
                <option value="{{ $industry->id }}"> {{ $industry->name }}</option>
                @endforeach
              </select>
              @error('industry')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Job Description -->
            <div class="relative w-full pb-4 md:pb-6">
              <label name="JobDescription" placeholder="Description" for="JobDescription"
                class="block text-sm font-medium text-gray-700">Job Description*</label>
              <textarea id="message" rows="4" name="JobDescription" id="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Please Enter the Jobs Description..."></textarea>
              @error('JobDescription')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Job Nature, Qualifications, and Number of Openings -->
            <div class="flex flex-col pb-4 sm:flex-row sm:space-x-4 sm:items-center">
              <select name="jobnatures_code"
                class="w-full text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                id="jobnatures">
                <option hidden value="">Select Job Type</option>
                @foreach ($jobnatures as $code)
                <option value="{{ $code->code }}"> {{ $code->name }}</option>
                @endforeach
              </select>
              @error('jobnatures_code')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror

              <select name="qualifications"
                class="w-full p-2 text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                id="qualifications">
                <option hidden value="">Select Qualification</option>
                @foreach ($qualifications as $qualification)
                <option value="{{ $qualification->id }}"> {{ $qualification->name }}</option>
                @endforeach
              </select>
              @error('qualifications')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror

              <div class="flex flex-col sm:flex-row sm:space-x-4">
                <input type="number"
                  class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  name="NumberofOpenings" placeholder="NumberofOpenings">
                @error('NumberofOpenings')
                <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror

                <input type="number"
                  class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  name="MinExpectedSalary" placeholder="MinExpectedSalary">
                @error('MinExpectedSalary')
                <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror

                <input type="number"
                  class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  name="MaxExpectedSalary" placeholder="MaxExpectedSalary">
                @error('MaxExpectedSalary')
                <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <!-- Contact Information -->
            <div class="flex flex-col pb-4 sm:flex-row sm:space-x-4 sm:items-center">
              <input type="text"
                class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                name="ContactPersonName" placeholder="ContactPersonName">
              @error('ContactPersonName')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror

              <input type="text"
                class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                name="ContactMobile" placeholder="ContactMobile">
              @error('ContactMobile')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror

              <input type="text"
                class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                name="ContactEmail" placeholder="ContactEmail">
              @error('ContactEmail')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Skills and Job Post Expiry Date -->
            <div class="flex flex-col pb-4 sm:flex-row sm:space-x-4">
              <input
                class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                type="text" name="skill1" placeholder="Skill">
              @error('skill1')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror

              <input
                class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                type="text" name="skill2" placeholder="Skill">
              @error('skill2')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror

              <input type="date" name="JobPostExpiryDate"
                class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600">
              @error('JobPostExpiryDate')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Posted For Employer -->
            <label class="text-xs tracking-wide text-gray-500">Posted For Employer*</label>
            <div class="flex pb-4">
              <input type="text"
                class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                name="PostedForEmployer" placeholder="PostedForEmployer">
              @error('PostedForEmployer')
              <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Submit Button -->
            <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700"
              type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection