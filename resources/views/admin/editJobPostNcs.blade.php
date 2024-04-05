@extends('layouts.admin')
@section('content')

<div class="py-5">
  <div class="px-4 mx-auto max-w-7xl">
    <h6 class="font-semibold text-gray-600 dark:text-gray-200">Post New Job</h6>

    <div class="items-center w-full py-4 space-y-2 lg:flex sm:space-y-4 md:space-y-2 lg:space-y-0">
      <div class="w-full p-5 bg-white border rounded">
        <div class="px-4 mx-auto max-w-7xl">
          <h6 class="font-semibold text-gray-600 dark:text-gray-200">Post New Job</h6>

          {{-- <div class="items-center w-full py-4 space-y-2 lg:flex sm:space-y-4 md:space-y-2 lg:space-y-0"> --}}
            {{-- @livewire('admin.job-post') --}}
            <form method="POST" action="{{ route('updateForm-Ncs',['id' => $job->id]) }}">
              @csrf
              {{-- @method('PUT') --}}
              <input type="text" hidden name="JobReferenceID" id="JobReferenceID" value="{{ rand() }}" readonly>
              <label class="text-xs tracking-wide text-gray-500" for="JobTitle">Job Title*</label>



              <div class="flex pb-6 justify-evenly">

                <input
                  class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  type="text" name="JobTitle" placeholder="JobTitle" value="{{ $job->JobTitle }}">

                <select name="sector"
                  class="w-full p-2 text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  id="sector">
                  @foreach ($sectors as $sector)
                  <option  value="{{ $sector->id }}">{{ $sector->name }}</option>
                  {{-- <option value="{{ $sector->id }}"> {{ $sector->name }}</option> --}}
                  @endforeach
                </select>
              </div>






              <div class="relative w-full pb-6 md:col-span-2">
                <label  for="JobDescription" name="JobDescription"
                  class="block text-sm font-medium text-gray-700">Job Description*</label>
                <textarea name="JobDescription" id="message" rows="4"  id="description"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   >{{ $job->JobDescription }}</textarea>
                {{-- <label class="block text-sm font-medium text-gray-700" for="description">Description*</label>
                <textarea name="JobDescription" id="description" placeholder="Description"></textarea> --}}
                @error('description')
                <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
              </div>




              <div class="flex pb-6 justify-evenly">
                <select name="industry"
                  class="w-full p-2 text-gray-600 border-gray-400 rounded ptext-base w- input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  id="indusrty">
                  @foreach ($indusrties as $industry)
                  {{-- <option hidden value="">Select Industry</option> --}}
                  <option value="{{ $industry->id }}"> {{ $industry->name }}</option>
                  @endforeach
                </select>


                <select name="jobnatures"
                  class="w-full text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  id="jobnatures">
                  @foreach ($jobnatures as $code)
                  {{-- <option hidden value="">Select Job Type</option> --}}
                  <option value="{{ $code->code }}"> {{ $code->code }}</option>
                  @endforeach
                </select>
              </div>

              <div class="pb-6">
                <select name="qualifications"
                  class="w-full p-2 text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  id="qualifications">
                  @foreach ($qualifications as $qualification)
                  {{-- <option hidden value="">Select Qualification</option> --}}
                  <option value="{{ $qualification->id }}"> {{ $qualification->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="flex justify-start w-2 pb-6">
                <div>
                <label class="text-xs tracking-wide text-gray-500" >Number of Openings*</label>
                <input type="number"
                  class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  name="NumberofOpenings" placeholder="NumberofOpenings" value="{{ $job->NumberofOpenings }}">
                </div>
                <div>
                  <label class="text-xs tracking-wide text-gray-500" for="MinExpectedSalary">Min Expected Salary*</label>
                  <input type="number"
                    class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                    name="MinExpectedSalary" placeholder="MinExpectedSalary" value="{{ $job->MinExpectedSalary }}">
                  </div>
                  <div>
                    <label class="text-xs tracking-wide text-gray-500" for="MaxExpectedSalary">Max Expected Salary*</label>
                    <input type="number"
                      class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                      name="MaxExpectedSalary" placeholder="MaxExpectedSalary" value="{{ $job->MaxExpectedSalary }}">
                    </div>
              </div>



              <div class="flex justify-start w-2 pb-6">
                <div>
                <label class="text-xs tracking-wide text-gray-500" >Contact Person Name*</label>
                <input type="text"
                  class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                  name="ContactPersonName" placeholder="ContactPersonName" value="{{ $job->ContactPersonName }}">
                </div>





                <div>
                  <label class="text-xs tracking-wide text-gray-500" >Contact Mobile*</label>
                  <input type="text"
                    class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                    name="ContactMobile" placeholder="ContactMobile" value="{{ $job->ContactMobile }}">
                  </div>

              

                  <div>
                    <label class="text-xs tracking-wide text-gray-500" for="ContactEmail">Contact Email*</label>
                    <input type="text"
                      class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
                      name="ContactEmail" placeholder="ContactEmail" value="{{ $job->ContactEmail }}">
                    </div>

              </div>



              <label class="text-xs tracking-wide text-gray-500" for="JobReferenceID">Skills*</label>
              <div class="flex justify-start pb-6">
                <input class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600" type="text" name="skill1" value="{{ $job->skill1 }}" placeholder="Skill">
                <input class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600" type="text" name="skill2" value="{{ $job->skill2 }}" placeholder="Skill">
              </div>

              {{-- <input type="text" name="Keyskills" placeholder="Keyskills"> --}}
              <label class="text-xs tracking-wide text-gray-500" for="JobReferenceID">Job Post Expiry Date*</label>
              <div class="flex justify-start pb-6">
              
              <input value="{{ $job->JobPostExpiryDate }}"  class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600" type="date" name="JobPostExpiryDate" placeholder="JobPostExpiryDate">
              </div>
              
              
              <label class="text-xs tracking-wide text-gray-500" for="JobReferenceID">Posted For Employer*</label>
              <div class="flex justify-start pb-6">
              
              <input value="{{ $job->PostedForEmployer }}" class="text-base text-gray-600 border-gray-400 rounded input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600" type="text" name="PostedForEmployer" placeholder="PostedForEmployer">

                </div>


              <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700"
                type="submit">Update</button>
            </form>
            {{--
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
{{-- bg-white rounded border p-5 w-full --}}



@endsection