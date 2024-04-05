@extends('layouts.web.app')

@section('title', 'Welcome to Employment Exchange')

@section('navbar')
@parent
@endsection

@section('content')
{{-- carousel --}}
<div class="py-5">
    <div class="flex overflow-x-hidden">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="content-center order-2 mt-10 md:flex-wrap md:flex md:order-1 md:mt-0">
                    <div>
                        <span class="text-2xl font-semibold md:text-3xl">Apply for employment index card and browse
                            jobs</span>
                        <div class="mt-2 empex md:mt-5"></div>

                    </div>

                    <div class="flex mt-4 max-w-1xl md:mt-10">

                        <img class="w-96" src="/images/lesde_logo.jpg" alt="lesde_logo">
                    </div>

                    <div
                        class="mt-2 pa-2 md:mt-10 sm:flex sm:justify-between justsify-around md:justify-between mdd:w-5/6">
                        <div>
                            <a href="#" class="flex p-2 hover:bg-empex-gray hover:rounded">
                                <img src="/images/main/playstore.svg" alt="playstore" class="my-auto">
                                <div class="mt-1 ml-3 md:mt-0">
                                    {{-- <div class="-mb-1 text-sm">Coming soon</div> --}}
                                    <div class="-mt-1 text-sm">Coming soon</div>
                                    <div class="font-semibold md:text-1xl">Mobile App</div>
                                </div>
                            </a>

                            <div class="flex p-2 hover:bg-empex-gray hover:rounded">
                                <img src="/images/main/contact.svg" alt="playstore" cladss="h-12 w-12 mx-auto">
                                <div class="mt-1 ml-3 md:mt-0">
                                    {{-- <div class="-mb-1 text-sm">Coming soon</div> --}}
                                    <div class="-mt-1 text-sm ">(Lunglei, Hnahthial)</div>
                                    <div class="font-semibold md:text-1xl">8131-875-533</div>
                                </div>
                            </div>
                            <div class="flex p-2 hover:bg-empex-gray hover:rounded">
                                <img src="/images/main/contact.svg" alt="playstore" classs="h-12 w-12 mx-auto">
                                <div class="mt-1 ml-3 md:mt-0">
                                    {{-- <div class="-mb-1 text-sm">Coming soon</div> --}}
                                    <div class="-mt-1 text-sm">(Champhai, Khawzawl)</div>
                                    <div class="font-semibold md:text-1xl">9233-671-799</div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <a href="#" class="flex p-2 hover:bg-empex-gray hover:rounded">
                                <img src="/images/main/contact.svg" alt="playstore" cladss="h-12 w-12 mx-auto">
                                <div class="mt-1 ml-3 md:mt-0">
                                    {{-- <div class="-mb-1 text-sm">Coming soon</div> --}}
                                    <div class="-mt-1 text-sm">(Aizawl, Kolasib, Mamit, Serchhip, Saitual)</div>
                                    <div class="font-semibold md:text-1xl">8729-982-569</div>
                                </div>
                            </a>

                            <div class="flex p-2 hover:bg-empex-gray hover:rounded">
                                <img src="/images/main/contact.svg" alt="playstore" cladss="h-12 w-12 mx-auto">
                                <div class="mt-1 ml-3 md:mt-0">
                                    {{-- <div class="-mb-1 text-sm">Coming soon</div> --}}
                                    <div class="-mt-1 text-sm">(Siaha, Lawngtlai)</div>
                                    <div class="font-semibold md:text-1xl">8798-168-493</div>
                                </div>
                            </div>
                            <div class="flex p-2 hover:bg-empex-gray hover:rounded">
                                <img src="/images/main/contact.svg" alt="playstore" cladss="h-12 w-12 mx-auto">
                                <div class="mt-1 ml-3 md:mt-0">
                                    {{-- <div class="-mb-1 text-sm">Coming soon</div> --}}
                                    <div class="-mt-1 text-sm">(Directorate)</div>
                                    <div class="font-semibold md:text-1xl">7085-354-654</div>
                                </div>
                            </div>
                        </div>



                    </div>




                    {{-- <div class="flex mt-4 md:mt-10">

                        <img src="/images/lesde_logo.jpg" alt="lesde_logo">
                    </div> --}}

                    {{-- <div class="mt-4 md:mt-6">
                        <a href="javascript:void(0)" id="videoTutorialTrigger"
                            class="flex p-2 font-semibold hover:bg-empex-gray hover:rounded text-empex-green">
                            <img src="/images/main/videoTutorial.svg" alt="video tutorial" class="w-6 h-6 mr-1">
                            View Tutorial Video
                        </a>
                    </div> --}}
                </div>





                <div class="order-1 object-cover w-full h-52 md:h-96 2xl:h-auto md:order-2">
                    <img class="order-1 object-cover w-full h-52 md:h-96 2xl:h-auto md:order-2" alt="1"
                        src="/images/main/banner.gif" />

                    <div class="mt-3 text-center">

                        <button id="videoTutorialTrigger"
                            class="px-4 py-2 font-semibold text-white border rounded bg-empex-green hover:text-white">
                            <svg class="inline blink-text" xmlns="http://www.w3.org/2000/svg" width="21.918"
                                height="21.918" viewBox="0 0 21.918 21.918">
                                <path data-name="Icon ionic-ios-play-circle"
                                    d="M14.334 3.375a10.959 10.959 0 1 0 10.959 10.959A10.957 10.957 0 0 0 14.334 3.375zm4.415 11.164-7.229 4.374a.234.234 0 0 1-.353-.205V9.961a.233.233 0 0 1 .353-.205l7.229 4.373a.242.242 0 0 1 0 .41z"
                                    transform="translate(-3.375 -3.375)" style="fill:#fff" />
                            </svg>

                            <span class="blink-text">View Tutoral</span>
                        </button>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

{{-- <div class="rounded max-w-7xl mx-auto border border-[#f5cb58] bg-[#fdf9ed]">
    <div class="grid grid-cols-8 gap-4">
        <div class="bg-[#f5cb58] p-4">
            <img src="/images/main/info.svg" alt="" class="mx-auto">
        </div>
        <div class="col-span-7 m-auto overflow-hidden">
            <div class="animate-marquee">
                <span>
                    <div class="font-bold">Important Notification!</div>
                    All Job Seekers registering through CSC and District Employment Exchange Offices before 31 Jan, 2023
                    should update their Employment profile in the EMPEX Portal, including Education, Experience, NCO
                    Code.
                </span>
                <span>
                    <div class="font-bold">Important Notification!</div>
                    All Job Seekers registering through CSC and District Employment Exchange Offices before 31 Jan, 2023
                    should update their Employment profile in the EMPEX Portal, including Education, Experience, NCO
                    Code.
                </span>
            </div>
        </div>
    </div>

</div> --}}

<div class="w-full py-12 bg-white">
    <div class="px-4 mx-auto max-w-7xl">

        {{-- statistics --}}
        <div class="grid grid-cols-1 gap-4 mb-10 md:grid-cols-3">
            <div class="flex w-full text-white border rounded">
                <div class="w-2/3 px-5 py-3 rounded-l" style="background-color: #009726;">
                    <div>
                        <img src="/images/main/registration.svg" alt="register" class="inline">
                        <span class="font-semibold">Registered</span>
                    </div>
                    {{-- <div class="text-xl font-bold text-empex-yellow">{{ $totalUsers }}</div> --}}
                    <div class="text-sm font-light" style="color: #b7e8cb;">New &nbsp; <span id=new-user
                            class="text-xl font-bold text-empex-yellow">{{ $totalUsers }}</span></div>
                    <div class="text-sm font-light" style="color: #b7e8cb;">Old &nbsp;&nbsp;&nbsp;<span id=old-user
                            class="text-xl font-bold text-empex-yellow">{{ $allTotalUsers }}</span></div>
                    <div class="text-sm font-light" style="color: #b7e8cb;">Total<span
                            class="text-xl font-bold text-empex-yellow">&nbsp;<span id=total-user>{{ (int) $totalUsers +
                                (int) $allTotalUsers }}</span></span>
                    </div>
                    <div class="flex justify-between mt-5">
                        <div>
                            <div class="text-sm font-light" style="color: #b7e8cb;">Aadhaar</div>
                            <div class="font-semibold">{{ $totalAadhaarGender }}</div>
                        </div>
                        <div>
                            <div class="text-sm font-light" style="color: #b7e8cb;">Non-Aadhaar</div>
                            <div class="font-semibold">{{ $totalNonAadhaarGender }}</div>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 px-5 py-3 rounded-r" style="background-color: #028723;">
                    <div>
                        <div class="text-sm font-light" style="color: #b7e8cb;">Male</div>
                        <div class="-mt-1 font-medium">{{ $totalMaleGender }}</div>
                        <div class="text-sm font-light" style="color: #b7e8cb;">Female</div>
                        <div class="-mt-1 font-medium">{{ $totalFemaleGender }}</div>
                        <div class="text-sm font-light" style="color: #b7e8cb;">Others</div>
                        <div class="-mt-1 font-medium">{{ $totalOtherGender }}</div>
                    </div>
                </div>
            </div>

            <div class="flex w-full text-white border rounded">
                <div class="w-2/3 px-5 py-3 rounded-l" style="background-color: #009726;">
                    <div>
                        <img src="/images/main/renew.svg" alt="renew" class="inline">
                        <span class="font-semibold">Renew</span>
                    </div>
                    <div class="text-xl font-bold text-empex-yellow">{{ $totalRenewUsers }}</div>
                    <div class="flex justify-between mt-5">
                        <div>
                            <div class="text-sm font-light" style="color: #b7e8cb;">Aadhaar</div>
                            <div class="font-semibold">{{ $totalRenewAadhaarGender }}</div>
                        </div>
                        <div>
                            <div class="text-sm font-light" style="color: #b7e8cb;">Non-Aadhaar</div>
                            <div class="font-semibold">{{ $totalRenewNonAadhaarGender }}</div>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 px-5 py-3 rounded-r" style="background-color: #028723;">
                    <div>
                        <div class="text-sm font-light" style="color: #b7e8cb;">Male</div>
                        <div class="-mt-1 font-medium">{{ $totalRenewMaleGender }}</div>
                        <div class="text-sm font-light" style="color: #b7e8cb;">Female</div>
                        <div class="-mt-1 font-medium">{{ $totalRenewFemaleGender }}</div>
                        <div class="text-sm font-light" style="color: #b7e8cb;">Others</div>
                        <div class="-mt-1 font-medium">{{ $totalRenewOtherGender }}</div>
                    </div>
                </div>
            </div>

            <div class="flex w-full text-white border rounded">
                <div class="w-2/3 px-5 py-3 rounded-l" style="background-color: #009726;">
                    <div>
                        <img src="/images/main/job.svg" alt="job" class="inline">
                        <span class="font-semibold">Job Post</span>
                    </div>
                    <div class="text-xl font-bold text-empex-yellow">{{ $totalJobs }}</div>
                    <div class="flex justify-between mt-5">
                        <div>
                            <div class="text-sm font-light" style="color: #b7e8cb;">Active</div>
                            <div class="font-semibold">{{ $totalActiveJobs }}</div>
                        </div>
                        <div>
                            <div class="text-sm font-light" style="color: #b7e8cb;">In-Active</div>
                            <div class="font-semibold">{{ $totalInactiveJobs }}</div>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 px-5 py-3 rounded-r" style="background-color: #028723;">
                    <div>
                        <div class="text-sm font-light" style="color: #b7e8cb;">Govt</div>
                        <div class="-mt-1 font-medium">{{ $totalGovtJobs }}</div>
                        <div class="text-sm font-light" style="color: #b7e8cb;">Private</div>
                        <div class="-mt-1 font-medium">{{ $totalPrivateJobs }}</div>
                        <div class="text-sm font-light" style="color: #b7e8cb;">Public</div>
                        <div class="-mt-1 font-medium">{{ $totalPublicJobs }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- placement card --}}
        <div class="grid grid-cols-1 gap-4 mb-10 md:grid-cols-3">
            <div class="flex w-full border rounded empex-gray">
                <div class="px-5 py-3 rounded-l w-2/2">
                    <div>
                        <img src="/images/main/placement.svg" alt="register" class="inline">
                    </div>
                    {{-- <div class="text-xl font-bold text-empex-yellow">{{ $totalUsers }}</div> --}}
                </div>
                <div class="w-2/3 py-3 rounded-r">
                    <div>
                        <div class="text-xl font-semibold text">{{ $totalPlacement }}</div>
                        <div class="-mt-1 font-medium text-empex-green">


                            Total No. of Placements
                        </div>
                        <div class="-mt-1 font-medium text-empex-green">


                            <a href="{{ route('web.placement',['district'=>1]) }}">
                                View more
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            </div>


            <div class="flex w-full border rounded empex-gray">
                <div class="px-5 py-3 rounded-l w-2/2">
                    <div>
                        <img src="/images/main/total_visitor.svg" alt="register" class="inline">
                    </div>
                    {{-- <div class="text-xl font-bold text-empex-yellow">{{ $totalUsers }}</div> --}}
                </div>
                <div class="w-2/3 py-3 rounded-r">
                    <div>
                        <div class="text-xl font-semibold text"> <span id="total-visitor">{{ $totalVisitors }}</span>
                        </div>
                        <div class="-mt-1 font-medium text-empex-green">


                            Total No. of Visitors
                        </div>

                    </div>
                </div>
            </div>


            <div class="flex w-full border rounded empex-gray">
                <div class="px-5 py-3 rounded-l w-2/2">
                    <div>
                        <img src="/images/main/total_visitor.svg" alt="register" class="inline">
                    </div>
                    {{-- <div class="text-xl font-bold text-empex-yellow">{{ $totalUsers }}</div> --}}
                </div>
                <div class="w-2/3 py-3 rounded-r">
                    <div>
                        <div class="text-xl font-semibold text"> <span id="today-visitor">{{ $todaysVisitors }}</span>
                        </div>
                        <div class="-mt-1 font-medium text-empex-green">


                            Visitors today
                        </div>

                    </div>
                </div>
            </div>


        </div>
        {{-- placement card --}}

        {{-- chart/notice board --}}
        <div class="grid grid-cols-1 mt-5 md:grid-cols-3 md:gap-4">
            <div class="order-2 col-span-2 p-5 border rounded md:order-1">
                <div class="text-3xl font-semibold">NCO Statistics</div>
                <div class="mt-3 empex"></div>
                <div class="mt-2 text-gray-400">Total Users based on NCO Division</div>
                <div class="my-5 canvas-content">








                    <div role='status'
                        class='w-full p-4 border border-gray-200 rounded shadow nco-skeleton nco-status animate-pulse md:p-6 dark:border-gray-700'>
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
                        <div class="w-48 h-2 mb-10 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                        <div class="flex items-baseline mt-4 space-x-6">
                            <div class='w-8 bg-gray-200 rounded-t-lg h-72 dark:bg-gray-700'></div>
                            <div class='w-8 h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700'></div>
                            <div class='w-8 bg-gray-200 rounded-t-lg h-72 dark:bg-gray-700'></div>
                            <div class='w-8 h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700'></div>
                            <div class='w-8 bg-gray-200 rounded-t-lg h-80 dark:bg-gray-700'></div>
                            <div class='w-8 bg-gray-200 rounded-t-lg h-72 dark:bg-gray-700'></div>
                            <div class='w-8 bg-gray-200 rounded-t-lg h-80 dark:bg-gray-700'></div>
                            <div class='w-8 bg-gray-200 rounded-t-lg h-80 dark:bg-gray-700'></div>
                            <div class='w-8 bg-gray-200 rounded-t-lg h-80 dark:bg-gray-700'></div>
                            <div class='w-8 bg-gray-200 rounded-t-lg h-80 dark:bg-gray-700'></div>
                        </div>
                        <span class='sr-only'>Loading...</span>
                    </div>

                    <canvas id="canvas" height="250" width="600"></canvas>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                    @php
                    $count = 1;
                    @endphp
                    @foreach ($ncoDivisions->chunk(6) as $division)
                    <div>
                        @foreach ($division as $nco)
                        <div class="flex items-center mb-2">
                            <div class="w-8 text-sm font-semibold text-center bg-empex-gray text-empex-green">
                                {{ sprintf('%02d', $count) }}
                            </div>
                            <div class="pl-3 text-sm text-gray-400">{{ $nco->name }}</div>
                        </div>
                        @php
                        $count++;
                        @endphp
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- notice board --}}
            <div class="order-1 p-5 mb-5 border rounded md:mb-0 md:order-2">
                <div class="text-3xl font-semibold">Notice Board</div>
                <div class="mt-3 empex"></div>
                <ul class="mt-5 divide-y">

                    @forelse ($noticeboards as $notice)
                    <li class="py-3">
                        <a href="/notice/{{ $notice->slug }}" class="font-normal hover:text-empex-green line-clamp-2">{{
                            $notice->title }}</a>

                        <br>
                        {{ $notice->content }}
                        <br />
                        <div class="mt-3 text-sm text-gray-400">
                            <span class="pr-2 mr-2 border-gray-300 ">{{ date('dS M Y', strtotime($notice->created_at))
                                }}</span>
                            @if ($notice->file != null)
                            <a href="{{ asset('storage/' . $notice->file) }}"
                                class="float-right hover:text-empex-green">
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5 text-empex-green"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                            @endif
                        </div>
                    </li>
                    @empty
                    <li>
                        {{-- Notice not found! --}}
                    </li>
                    @endforelse

                    <li class="py-3">
                        <b>Important Notice!</b>
                        <br>
                        Hna zawnglai mek ten CSC kaltlang emaw District Employment
                        Exchange Office a ni 31 Jan 2023 hma a lo in register tawh te chuan an Employment profile Empex
                        Portal ah heng education,
                        experience, NCO Code te hi update tur a ni e
                        <br />
                        <p class="font-light text-gray-500">
                            (All Job Seekers who had registered through CSC and District Employment Exchange Offices
                            before 31 Jan 2023
                            should update their Employment profile in the EMPEX Portal, including Education, Experience,
                            NCO Code.)
                        </p>
                    </li>

                    <li class="py-3">
                        <b>Fees</b>
                        <br>
                        Service Charge - ₹ 20
                        <br>
                        CSC Facilitation Charge - ₹ 30
                    </li>
                    @if (count($noticeboards) > 0)
                    <li class="pt-5">
                        <a href="{{ route('web.notice-board') }}" class="font-semibold uppercase text-empex-green">view
                            All</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        @guest
        <div class="grid grid-cols-1 mt-5 md:grid-cols-2 md:gap-4">
            <div class="p-5 mb-5 text-white border rounded bg-empex-green md:mb-0">
                <div class="flex justify-between p-3 md:p-5">
                    <div>
                        <div class="mb-2 text-xl font-bold md:text-2xl">Hna i zawng em ?</div>
                        <div class="mb-5 text-lg font-light md:text-xl md:mb-14">Are you looking for Jobs?</div>
                        <a href="{{ route('signup') }}">
                            Register Now
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                    <img src="/images/features/employee.svg" alt="employee" class="h-12 md:h-auto">
                </div>
            </div>

            <div class="p-5 text-white border rounded bg-empex-green">
                <div class="flex justify-between p-3 md:p-5">
                    <div>
                        <div class="mb-2 text-xl font-bold md:text-2xl">Hnathawk tu tur i zawng em?</div>
                        <div class="mb-5 text-lg font-light md:text-xl md:mb-14">Are you an Employer?</div>
                        <a href="{{ route('register') }}">
                            Let's Create Job
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                    <img src="/images/features/employer.svg" alt="employer" class="h-12 md:h-auto">
                </div>
            </div>
        </div>
        @endguest

        <div class="flex justify-center mt-10 text-2xl font-semibold md:text-3xl" id="videoTutorialPlaceholder">
            Learn how to use EmpEx
        </div>

        <div class="grid grid-cols-1 gap-4 mt-5 md:grid-cols-3">
            <div>
                <iframe width="100%" height="228" src="https://www.youtube.com/embed/GvBmBLphpZc"
                    title="Employment card register dan leh Jobs en dan" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div>
                <iframe width="100%" height="228" src="https://www.youtube.com/embed/heZjAvzeHNw"
                    title="Job Employer tana hna post dan" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div>
                <iframe width="100%" height="228" src="https://www.youtube.com/embed/0GkTcwS6VDg"
                    title="Govt. Department hna post dan" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

{{-- features --}}
<div class="w-full py-12 bg-custom-yellow">
    <div class="px-4 mx-auto max-w-7xl" style="color: #404040;">
        <div class="text-3xl font-semibold text-center">Features</div>
        <div class="grid grid-cols-2 gap-2 mt-5 text-center md:grid-cols-3 md:gap-8 gap-y-4">
            <div class="md:p-3">
                <img class="mx-auto" src="/images/features/employment_registration_black.svg"
                    alt="employment registration">
                <div class="mt-1 font-semibold">Employment Registration</div>
                <div class="mt-2 text-sm">Online registration of applicant in Employment Exchange.</div>
            </div>
            <div class="md:p-3">
                <img class="mx-auto" src="/images/features/job_black.svg" alt="Job Notification">
                <div class="mt-1 font-semibold">Job Notification</div>
                <div class="mt-2 text-sm">Registered user can get notify to the registered mobile number using
                    SMS</div>
            </div>
            <a href="https://www.ncs.gov.in/Pages/Search.aspx?OT=fheFJjl41aGWG85YSvGqng%3D%3D&Source=https://www.ncs.gov.in/"
                target="_blank" class="md:p-3">
                <img class="mx-auto" src="/images/features/news_black.svg" alt="Employment News">
                <div class="mt-1 font-semibold">Employment News</div>
                <div class="mt-2 text-sm">Employment News will be shown through this portal</div>
            </a>
            <div class="md:p-3">
                <img class="mx-auto" src="/images/features/job_post_black.svg" alt="Job Posting">
                <div class="mt-1 font-semibold">Job Posting</div>
                <div class="mt-2 text-sm">This portal allows employer to post latest jobs</div>
            </div>
            <div class="md:p-3">
                <img class="mx-auto" src="/images/features/user_management_black.svg" alt="User Management">
                <div class="mt-1 font-semibold">User Management</div>
                <div class="mt-2 text-sm">The ability for administrators to manage user access.</div>
            </div>
            <div class="md:p-3">
                <img class="mx-auto" src="/images/features/post_management_black.svg" alt="Post Management">
                <div class="mt-1 font-semibold">Post Management</div>
                <div class="mt-2 text-sm">This allows to maintain information such as news & other various
                    updates.</div>
            </div>
        </div>
    </div>
</div>

{{-- workflow --}}
<div class="w-full py-12 bg-green-50">
    <div class="px-4 mx-auto max-w-7xl">
        <div class="text-3xl font-semibold">User Workflow</div>
        <div class="mt-3 empex"></div>

        <div class="w-full mt-5">
            <img src="/images/main/workflow.svg" alt="workflow" class="hidden w-full md:block">
            <img src="/images/main/workflow_mobile.svg" alt="workflow" class="block w-full md:hidden">
        </div>
    </div>
</div>
@endsection

@section('footer')
@parent
@endsection

@section('copyright')
@parent

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<script>
    let newUserElem = document.querySelector('#new-user');
        let allUserElem = document.querySelector('#old-user');
        let totalUserElem = document.querySelector('#total-user');


        let totalVisitor = document.querySelector('#total-visitor');
        let todayVisitor = document.querySelector('#today-visitor');

        // console.log('today',todayVisitor.innerText);



        //total visitor
        let number = +totalVisitor.innerText;
        totalVisitor.innerText = number?.toLocaleString("en-IN", {
            maximumFractionDigits: 2,
            // style: "currency",
            currency: "INR",
        });


        //today visitor
        number = +todayVisitor.innerText;
        todayVisitor.innerText = number?.toLocaleString("en-IN", {
            maximumFractionDigits: 2,
            // style: "currency",
            currency: "INR",
        });



        number = +newUserElem.innerText;
        newUserElem.innerText = number?.toLocaleString("en-IN", {
            maximumFractionDigits: 2,
            // style: "currency",
            currency: "INR",
        });


        number = +allUserElem.innerText;
        allUserElem.innerText = number?.toLocaleString("en-IN", {
            maximumFractionDigits: 2,
            currency: "INR",
        });

        number = +totalUserElem.innerText;
        totalUserElem.innerText = number?.toLocaleString("en-IN", {
            maximumFractionDigits: 2,
            currency: "INR",
        });


        $(document).ready(function() {


            var ncsstat = document.querySelector(".nco-status");
            var camvas = document.querySelector("#canvas");
            camvas.style.display = 'none';
            var ncsStatistics = [];


            fetch("nco-stat")
                .then((response) => response.json())
                .then((data) => {
                    ncsStatistics = data.ncoStatistics;

                    var ctx = document.getElementById("canvas").getContext('2d');

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10'],
                            datasets: [{
                                label: 'User',
                                data: ncsStatistics,
                                backgroundColor: '#2d9735'
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                    barThickness: 20,
                                    maxBarThickness: 20,
                                }]
                            }
                        }
                    });


                    ncsstat.style.display = 'none';
                    camvas.style.display = 'block';

                })
            //added rj






        });
</script>
@endsection
