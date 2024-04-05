@extends('layouts.web.app')

@section('title', 'Jobs Post - Empex')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="px-4 mx-auto my-10 max-w-7xl">
        <div class="w-full">
            <div class="my-3 ml-5 text-sm font-semibold ">
                Employment News
            </div>
        </div>

        @if (Session('jobMessage'))
            <div class="flex flex-col mb-2 bg-white border rounded shadow md:mb-4 border-empex-yellow" x-data="{ show: true }"
                x-show="show" x-init="setTimeout(() => show = false, 5000)">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-2 rounded-l bg-empex-yellow">
                            <img src="/images/auth/info.svg" alt="noti">
                        </div>
                        <div class="flex flex-col mx-3">
                            <div class="font-medium leading-none">{{ session('jobMessage') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
            <div class="w-full col-span-2 mb-5 overflow-hidden md:bg-white md:rounded-lg md:shadow md:border md:mb-0">
                <div class="md:px-6 md:py-4">
                    <form action="" method="get" id="searchForm">
                        <div class="grid content-center grid-cols-6 my-3">
                            <div class="col-span-4">
                                <div class="relative">
                                    <input type="search" required name="q" value="{{ $search }}" id="search"
                                        class="w-full py-2 text-sm rounded-md text-dark bg-empex-gray focus:outline-none focus:bg-white border-empex-green focus:ring-0 focus:border-empex-green"
                                        placeholder="Search..." autocomplete="off">

                                    <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                class="w-4 h-4">
                                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="flex justify-end col-span-2">
                                <button type="button" class="flex mt-1 mr-5 text-right"
                                onclick="openPopover(event,'showFilterOption')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            <span class="hidden ml-2 md:inline">Filter</span>
                        </button>
                        <button type="button" class="flex mt-1 text-right"
                        onclick="openPopover(event,'showSortingOption')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                    </svg>
                    <span class="hidden ml-2 md:inline">Sort</span>
                </button>
            </div>
            
            
                            <div class="z-50 hidden max-w-xs mr-3 text-sm font-normal leading-normal no-underline break-words bg-white border rounded-lg shadow"
                                id="showSortingOption">
                                <div class="p-3 mb-0 text-gray-700 rounded-t-lg opacity-75">
                                    <div class="mb-2">
                                        <span class="font-semibold text-black">Sort</span>
                                        <button type="button" class="float-right"
                                            onclick="openPopover(event,'showSortingOption')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="flex items-center mb-2 mr-4">
                                        <input type="radio" {{ $sort == 'n' ? 'checked' : '' }} name="sort"
                                            value="n" id="newest"
                                            class="w-4 h-4 mr-2 rounded-full cursor-pointer text-empex-green ring-0 focus:ring-0 sortJob">
                                        <label for="newest" class="cursor-pointer">Newest</label>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <input type="radio" {{ $sort == 'o' ? 'checked' : '' }} name="sort"
                                            value="o" id="oldest"
                                            class="w-4 h-4 mr-2 rounded-full cursor-pointer text-empex-green ring-0 focus:ring-0 sortJob">
                                        <label for="oldest" class="cursor-pointer">Oldest</label>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <input type="radio" {{ $sort == 'e' ? 'checked' : '' }} name="sort"
                                            value="e" id="expire"
                                            class="w-4 h-4 mr-2 rounded-full cursor-pointer text-empex-green ring-0 focus:ring-0 sortJob">
                                        <label for="expire" class="cursor-pointer">Expiring Soon</label>
                                    </div>
                                </div>
                            </div>

                            <div class="z-50 hidden max-w-xs mr-3 text-sm font-normal leading-normal no-underline break-words bg-white border rounded-lg shadow"
                                id="showFilterOption">
                                <div class="p-3 mb-0 text-gray-700 rounded-t-lg opacity-75">
                                    <div class="mb-2">
                                        <span class="text-black">
                                            <span class="font-semibold">
                                                Filters
                                            </span>
                                        </span>
                                        <button type="button" class="float-right"
                                            onclick="openPopover(event,'showFilterOption')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="flex items-center mb-2 mr-4">
                                        <input type="radio" {{ $filter == 'all' ? 'checked' : '' }} name="filter"
                                            value="all" id="all"
                                            class="w-4 h-4 mr-2 rounded-full cursor-pointer text-empex-green ring-0 focus:ring-0 filterJob">
                                        <label for="all" class="cursor-pointer">All Job</label>
                                    </div>
                                    <div class="flex items-center mb-2 mr-4">
                                        <input type="radio" {{ $filter == 'contract' ? 'checked' : '' }} name="filter"
                                            value="contract" id="contract"
                                            class="w-4 h-4 mr-2 rounded-full cursor-pointer text-empex-green ring-0 focus:ring-0 filterJob">
                                        <label for="contract" class="cursor-pointer">Contractual</label>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <input type="radio" {{ $filter == 'Deputation' ? 'checked' : '' }} name="filter"
                                            value="Deputation" id="Deputation"
                                            class="w-4 h-4 mr-2 rounded-full cursor-pointer text-empex-green ring-0 focus:ring-0 filterJob">
                                        <label for="Deputation" class="cursor-pointer">Deputation</label>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <input type="radio" {{ $filter == 'full' ? 'checked' : '' }} name="filter"
                                            value="full" id="full"
                                            class="w-4 h-4 mr-2 rounded-full cursor-pointer text-empex-green ring-0 focus:ring-0 filterJob">
                                        <label for="full" class="cursor-pointer">Full Time</label>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <input type="radio" {{ $filter == 'intern' ? 'checked' : '' }} name="filter"
                                            value="intern" id="intern"
                                            class="w-4 h-4 mr-2 rounded-full cursor-pointer text-empex-green ring-0 focus:ring-0 filterJob">
                                        <label for="intern" class="cursor-pointer">InternShip</label>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <input type="radio" {{ $filter == 'ptime' ? 'checked' : '' }} name="filter"
                                            value="ptime" id="ptime"
                                            class="w-4 h-4 mr-2 rounded-full cursor-pointer text-empex-green ring-0 focus:ring-0 filterJob">
                                        <label for="ptime" class="cursor-pointer">Govt. Department</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <ul class="divide-y-2 divide-gray-400">
                        @forelse ($jobLists as $job)
                            @guest
                                <a href="javascript:void()" @click="jobSignupDialog = true">
                                @else
                                    <a href="/employment-newsNcs/{{ $job->JobTitle }}">
                                    @endguest
                                    <li class="flex p-3 border-b border-gray-200 hover:bg-empex-gray hover:text-dark">
                                        <div>
                                            <div class="font-normal line-clamp-2">{{ $job->JobTitle }}</div>
                                            <div class="mt-3 text-sm text-gray-400">
                                                <span
                                                    class="pr-2 mr-2 border-r-2 border-gray-300 md:pr-5 md:mr-5">{{ $job->NumberofOpenings }}
                                                    post</span>
                                                <span class="pr-2 mr-2 border-r-2 border-gray-300 md:pr-5 md:mr-5"><span
                                                        class="hidden md:inline">Due
                                                        date:</span>
                                                    {{ date('d', strtotime($job->due_date_of_submission)) }}<sup>{{ date('S', strtotime($job->JobPostExpiryDate)) }}</sup>{{ date(' M Y', strtotime($job->due_date_of_submission)) }}</span>
                                                <span>{{ $job->organization_name }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            @empty
                                <div class="font-normal">Job not found</div>
                        @endforelse
                    </ul>

                    <div class="py-2">
                        {{ $jobLists->appends(['q' => $search, 'sort' => $sort, 'filter' => $filter])->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>

            <div>
                <div class="w-full overflow-hidden bg-white border rounded-lg shadow md:h-32">
                    <div class="px-2 py-4">
                        <div class="flex justify-center">
                            <div>
                                <img src="/images/auth/quick_link2.svg" alt="jobimg" class="h-16">
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold">{{ $parTime }}</div>
                                <div class="text-sm text-gray-500">Part Time</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold">{{ $Internship }}</div>
                                <div class="pl-5 text-sm text-gray-500">Intern Ship</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold">{{ $FullTime }}</div>
                                <div class="text-sm text-gray-500">Full Time</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold">{{ $Deputation }}</div>
                                <div class="text-sm text-gray-500">Deputation</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold">{{ $Contractual }}</div>
                                <div class="text-sm text-gray-500">Contractual</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden border-t md:mt-3 border-empex-yellow md:bg-white md:rounded-lg md:shadow md:border md:border-gray-200"
                    style="height: max-content">
                    <div class="px-6 py-4 ">
                        <div class="font-semibold text-empex-green">Hriattirna</div>
                        {{-- @guest --}}
                            {{-- <div class="text-gray-500"><a href="{{ route('login') }}" class="text-empex-green">Login</a> to
                                see...</div> --}}

                            {{-- <div class="text-gray-500">He hna hi chipchiar zawk a i en duh chuan in ziak lut ve rawh le</div>
                            <div class="text-gray-500">
                                I hming leh phone number chauh a ngai e
                            </div> --}}

                            {{-- <div>
                                <a href="{{ route('login') }}" class="text-empex-green">Login</a>
                            </div> --}}
                        {{-- @else --}}
                           He page-a Hnaruak tarlan zawng zawng hi NCS(<a target="blank" href="https://www.ncs.gov.in/" class="text-blue-800 underline text-decoration-line:">National Career Service </a>) portal atanga lak a ni a, Hnaruak tarlan zingah hian iduhzawng a awm chuan azawnah hian hmet la, a chhungah hian Hna dilna tur link a awm ang.
                           
                        {{-- @endguest --}}
                    </div>
                </div>



                <div class="w-full overflow-hidden border-t md:mt-3 border-empex-yellow md:bg-white md:rounded-lg md:shadow md:border md:border-gray-200"
                    style="height: max-content">
                    <div class="px-6 py-4 ">
                        <div class="font-semibold text-empex-green">Information</div>
                        {{-- @guest --}}
                            {{-- <div class="text-gray-500"><a href="{{ route('login') }}" class="text-empex-green">Login</a> to
                                see...</div> --}}

                            {{-- <div class="text-gray-500">He hna hi chipchiar zawk a i en duh chuan in ziak lut ve rawh le</div>
                            <div class="text-gray-500">
                                I hming leh phone number chauh a ngai e
                            </div> --}}

                            {{-- <div>
                                <a href="{{ route('login') }}" class="text-empex-green">Login</a>
                            </div> --}}
                        {{-- @else --}}
                        <div class="">
                            All the Job opening shown in this page are from NCS(<a target="blank" href="https://www.ncs.gov.in/" class="text-blue-800 underline text-decoration-line:">National Career Service </a>) portal if you wish to apply for any of the given Jobs, click on the specific Job inside which there will be a link to apply for the given Job.
                           
                        </div>
                        {{-- @endguest --}}
                    </div>
                </div>
            </div>




                

{{-- Added by Sunny --}}

                
            </div>
        </div>
    </div>

    {{-- job signup modal --}}
    <div class="fixed inset-0 z-20 w-full h-full overflow-y-auto duration-300 bg-black bg-opacity-50"
        x-show="jobSignupDialog" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="relative mx-2 my-10 opacity-100 sm:w-3/4 md:w-1/2 lg:w-1/3 sm:mx-auto">
            <div style="min-height: 27rem;" class="relative z-20 text-gray-900 bg-white rounded-md shadow-lg h-96"
                @click.away="jobSignupDialog = false" x-show="jobSignupDialog"
                x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0"
                x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300"
                x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                <header class="flex items-center justify-between p-2">
                    <div></div>
                    <button class="float-right p-2 focus:outline-none" @click="jobSignupDialog = false">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </header>
                <main class="p-2 text-center">
                    <div>
                        <img class="mx-auto" src="/images/modal/job.svg" alt="job signup">
                    </div>
                    <div class="my-5 font-semibold text-gray-700 ">
                        Signup on EmpEx to view Employment News
                    </div>
                    {{-- <div class="mb-5 text-gray-500 ">
					only Name and Phone no. is required
				</div> --}}
                    <div class="mb-5 text-gray-500 ">
                        He hna hi chipchiar zawk a i en duh chuan in ziak lut ve rawh le <br>
                        I hming leh phone number chauh a ngai e
                    </div>
                    <div class="mb-5 ">
                        <a href="{{ route('signup') }}"
                            class="px-6 py-1 text-gray-100 rounded bg-empex-green hover:bg-green-400 focus:outline-none">SIGNUP</a>
                    </div>
                </main>
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

<script type="module">
	document.getElementById("search").addEventListener("search", function(event) {
    document.getElementById("searchForm").submit();
	});

	$(document).on('change', '.sortJob, .filterJob', function () {
		$('#searchForm').submit();
	})
</script>
