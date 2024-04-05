<div class="bg-white border p-5 rounded shadow-sm mt-5">
    <div class="flex justify-between mb-3">
        <div>Report Detail</div>
        <button wire:click="downloadEducation"
            class="text-empex-green border brder-empex-green bg-white px-6 py-2 rounded hover:bg-empex-gray">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pb-1 inline" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Download
        </button>
    </div>
    <div class="flex flex-col w-full">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <table class="table-auto w-full">
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
                        <td class="border border-black text-center" rowspan="2">Sl. No</td>
                        <td class="border border-black text-center" rowspan="2">Category</td>
                        <td class="border border-black text-center" rowspan="2">Subject</td>
                        <td class="border border-black text-center" colspan="2">
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
                        <td class="border border-black text-center" rowspan="2">Total</td>
                        <td class="border border-black text-center" colspan="2">Lapsed</td>
                        <td class="border border-black text-center" rowspan="2">Total</td>
                        <td class="border border-black text-center" colspan="2">Placed</td>
                        <td class="border border-black text-center" rowspan="2">Total</td>
                        <td class="border border-black text-center" colspan="2">Live Register</td>
                        <td class="border border-black text-center" rowspan="2">Total</td>
                    </tr>
                    <tr class="border border-black">
                        <td class="border border-black text-center">Male</td>
                        <td class="border border-black text-center">Female</td>
                        <td class="border border-black text-center">Male</td>
                        <td class="border border-black text-center">Female</td>
                        <td class="border border-black text-center">Male</td>
                        <td class="border border-black text-center">Female</td>
                        <td class="border border-black text-center">Male</td>
                        <td class="border border-black text-center">Female</td>
                    </tr>
                    
                    
                    @foreach ($educations as $quali)
                    <tr class="border border-black text-center">
                        <td class="border border-black text-center"
                            rowspan="{{ count($quali['subject']) > 0 ? count($quali['subject']) : '' }}">
                            {{ $loop->iteration }}
                        </td>
                        <td class="border border-black text-center"
                            rowspan="{{ count($quali['subject']) > 0 ? count($quali['subject']) : '' }}">
                            {{ $quali['name'] }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
