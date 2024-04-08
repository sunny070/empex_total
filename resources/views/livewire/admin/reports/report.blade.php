<div class="p-5 mt-5 bg-white border rounded shadow-sm">
    <div class="p-5 bg-white border rounded shadow-sm">
        <div class="grid grid-cols-1 gap-2 md:grid-cols-5">
            <div>
                <label class="text-xs">Category</label>
                <select wire:model="category" class="w-full p-2 border rounded border-empex-gray">
                    <option value="All">All Category</option>
                    <option value="Mizo">Mizo</option>
                    <option value="Non-Mizo">Non-Mizo</option>
                    <option value="Physically Handicapped">Physically Handicapped</option>
                    <option value="Education">Education</option>
                </select>
            </div>

            <div>
                <label class="text-xs">District</label>
                <select wire:model="district" class="w-full p-2 border rounded border-empex-gray">
                    <option value="All">All District</option>
                    @foreach ($districts as $dist)
                    <option value="{{ $dist->id }}">{{ $dist->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-xs">Duration</label>
                <select class="w-full p-2 border rounded border-empex-gray" wire:model="duration">
                    <option value="Custom">Custom</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Quarterly">Quarterly</option>
                    <option value="Half-Yearly">Half-Yearly</option>
                    <option value="Yearly">Yearly</option>
                </select>
            </div>

            @if ($duration != 'Yearly')
            <div>
                @if ($duration == 'Custom')
                <label class="text-xs">From</label>
                <input wire:model="from" type="date" class="w-full p-2 border rounded border-empex-gray">
                @elseif ($duration == 'Monthly')
                <label class="text-xs">Month</label>
                <select wire:model="month" class="w-full p-2 border rounded border-empex-gray">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                @elseif ($duration == 'Quarterly')
                <label class="text-xs">Quarterly</label>
                <select wire:model="quarter" class="w-full p-2 border rounded border-empex-gray">
                    <option value="01">1st Quarter</option>
                    <option value="02">2nd Quarter</option>
                    <option value="03">3rd Quarter</option>
                    <option value="04">4th Quarter</option>
                </select>
                @else
                <label class="text-xs">Half Yearly</label>
                <select wire:model="half" class="w-full p-2 border rounded border-empex-gray">
                    <option value="01">1st Half</option>
                    <option value="02">2nd Half</option>
                </select>
                @endif
            </div>
            @endif

            <div>
                @if ($duration == 'Custom')
                <label class="text-xs">To</label>
                <input wire:model="to" min="{{ $this->from }}" type="date"
                    class="w-full p-2 border rounded border-empex-gray">
                @else
                <label class="text-xs">Year</label>
                <select wire:model="year" class="w-full p-2 border rounded border-empex-gray">
                    @foreach ($years as $yr)
                    <option value="{{ $yr }}">{{ $yr }}</option>
                    @endforeach
                </select>
                @endif
            </div>
        </div>
        <div class="mt-3">
            <button wire:loading.attr="disabled"
                wire:loading.class="cursor-not-allowed bg-empex-gray hover:bg-empex-gray"
                wire:click.prevent="generateReport"
                class=" px-6 py-2 rounded bg-empex-green text-white   {{ $buttonEnable == false ? 'bg-empex-gray cursor-not-allowed' : 'hover:bg-green-600' }} ">
                <span wire:loading.remove wire:target='generateReport'>
                    GENERATE
                </span>

                <span wire:loading wire:target='generateReport'>
                    GENERATING
                </span>
            </button>

            {{-- <button {{ $buttonEnable==false ? 'disabled' : '' }} wire:click="generateReport"
                class=" px-6 py-2 rounded {{ $buttonEnable == false ? 'bg-empex-gray cursor-not-allowed' : 'bg-empex-green text-white hover:bg-green-600' }}">
                GENERATE
            </button> --}}
        </div>
    </div>











    @if ($generated)
    <div class="flex justify-between mb-3">
        <div>Report Detail</div>
        <button wire:click="downloadEducation"
            class="px-6 py-2 bg-white border rounded text-empex-green brder-empex-green hover:bg-empex-gray">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 pb-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Download
        </button>
    </div>
    <div class="flex flex-col w-full">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="w-full table-auto">
                    <tr class="border border-black">
                        <th class="text-center" colspan="8">
                            REPORT OF EMPLOYMENT STATISTICS OF {{ $districtName }} DISTRICT EMPLOYMENT
                            EXCHANGE
                        </th>
                        <th colspan="7">
                            @if ($duration != 'Custom')
                            {{ $duration == 'Monthly'
                            ? 'The Month'
                            : ($duration == 'Quarterly'
                            ? 'The Quarter'
                            : ($duration == 'Half-Yearly'
                            ? 'Half Year'
                            : ($duration == 'Yearly'
                            ? 'The Year'
                            : ($duration == 'Custom'
                            ? 'Custom'
                            : '')))) }},
                            {{ $year }}
                            @else
                            From: {{ date('d M Y', strtotime($from)) }} -
                            {{ date('d M Y', strtotime($to)) }}
                            @endif
                        </th>
                    </tr>
                    <tr class="border border-black">
                        <td class="text-center border border-black" rowspan="2">Sl. No</td>
                        <td class="text-center border border-black" rowspan="2">Category</td>
                        <td class="text-center border border-black" rowspan="2">Subject</td>
                        <td class="text-center border border-black" colspan="2">
                            {{ $duration == 'Monthly'
                            ? 'The Month'
                            : ($duration == 'Quarterly'
                            ? 'The Quarter'
                            : ($duration == 'Half-Yearly'
                            ? 'Half Year'
                            : ($duration == 'Yearly'
                            ? 'The Year'
                            : ($duration == 'Custom'
                            ? 'Custom'
                            : '')))) }}
                        </td>
                        <td class="text-center border border-black" rowspan="2">Total</td>
                        <td class="text-center border border-black" colspan="2">Lapsed</td>
                        <td class="text-center border border-black" rowspan="2">Total</td>
                        <td class="text-center border border-black" colspan="2">Placed</td>
                        <td class="text-center border border-black" rowspan="2">Total</td>
                        <td class="text-center border border-black" colspan="2">Live Register</td>
                        <td class="text-center border border-black" rowspan="2">Total</td>
                    </tr>
                    <tr class="border border-black">
                        <td class="text-center border border-black">Male</td>
                        <td class="text-center border border-black">Female</td>
                        <td class="text-center border border-black">Male</td>
                        <td class="text-center border border-black">Female</td>
                        <td class="text-center border border-black">Male</td>
                        <td class="text-center border border-black">Female</td>
                        <td class="text-center border border-black">Male</td>
                        <td class="text-center border border-black">Female</td>
                    </tr>
                    
                    
                    @foreach ($reports as $index => $quali)
                    
                    <tr class="text-center border border-black">
                        <td class="text-center border border-black">{{ $index + 1 }}</td>
                        @if ($index == 0)
                            <td class="text-center border border-black" rowspan="{{ count($reports) }}">
                                {{ $category }}
                            </td>
                            @endif
                            {{-- <td class="text-center border border-black"
                                >
                                {{ $quali['name'] }}
                            </td> --}}
                            <td class="text-center border border-black">{{ $quali['category'] }}</td>
                            <td class="text-center border border-black">{{ $quali['maleReport'] }}</td>
                            <td class="text-center border border-black"
                                >
                                Total
                            </td>
                            <td class="text-center border border-black"
                                >
                                12
                            </td>
                            <td class="text-center border border-black"
                                >
                                11
                            </td>
                            <td class="text-center border border-black"
                                >
                                Total
                            </td>
                            <td class="text-center border border-black"
                                >
                                12
                            </td>
                            <td class="text-center border border-black"
                                >
                                11
                            </td>
                            <td class="text-center border border-black"
                                >
                                Total
                            </td>
                            <td class="text-center border border-black"
                                >
                                12
                            </td>
                            <td class="text-center border border-black"
                                >
                                11
                            </td>
                            <td class="text-center border border-black"
                                >
                                Total
                            </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
