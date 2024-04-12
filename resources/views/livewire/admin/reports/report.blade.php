<div>
    <div>
        <button wire:click="resetFilters">Reset</button>
    </div>

    <!-- Filter Inputs -->
    <div class="flex justify-evenly items-center py-10">

        <div class="">
            <label for="category">Category:</label>
            <select wire:model="category" id="category" wire:change="render">
                <option value="all">All</option>
                <option value="Mizo">Mizo</option>
                <option value="Non-Mizo">Non-Mizo</option>
                <option value="Non-Mizo">Physically Handicapped</option>
                {{-- <option value="Non-Mizo">Non-Miz</option> --}}

            </select>
        </div>

        <div>
            <label for="district">District:</label>
            <select wire:model="district" id="district">
                <option value="all">All</option>
                <!-- Add options for districts -->
                @foreach($districts as $district)
                <option value="{{ $district->name }}">{{ $district->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="duration">Duration:</label>
            <select wire:model="duration" id="duration" wire:change="render">
                <!-- Add options for duration -->
                <option value="monthly">Monthly</option>
                <option value="half-yearly">Half-Yearly</option>
                <option value="yearly">Yearly</option>
                <option value="daily">Daily</option>
            </select>

            @if($duration == 'yearly')
            <select wire:model="selectedYear">
                @foreach ($this->generateYears() as $year)
                <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
            @endif
            <!-- Monthly dropdown (visible when 'monthly' duration is selected) -->
            @if($duration == 'monthly')
            <select wire:model="month" id="month">
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
            @endif
        </div>
    </div>
    <!-- Report Data -->
    <div class="py-10">
        {{-- @if($generated)
            <p>Report generated successfully!</p> --}}
            <table style="border-collapse: collapse; width: 100%; text-align: center; background:#FFF py-10">
                <thead>
                    <tr>
                        <th style="border: 1px solid black;">Serial Number</th>
                        <th style="border: 1px solid black;">Name</th>
                        <th style="border: 1px solid black;">Category</th>
                        <th style="border: 1px solid black;">Qualification</th>
                        <th style="border: 1px solid black;">Gender</th>
                        {{-- <th style="border: 1px solid black;">Female</th>
                        <th style="border: 1px solid black;">Others</th> --}}
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $info)
                    <tr>
                        <td style="border: 1px solid black;">{{ $index + 1 }}</td>
                        <td style="border: 1px solid black;">{{ $info->full_name }}</td>
                        <td style="border: 1px solid black;">{{ $category }}</td>
                        <td style="border: 1px solid black;">
                            @if ($info->education)
                                @if ($info->education instanceof \Illuminate\Support\Collection)
                                    @foreach ($info->education as $education)
                                        {{ $education->qualification->name }}<br>
                                    @endforeach
                                @else
                                    {{ $info->education->qualification }}
                                @endif
                            @endif
                        </td>
                        <td style="border: 1px solid black;">{{ $info->gender }}</td>
                        
                       
                    </tr>
                    @endforeach
        
                    <!-- Additional rows for users from the PhysicalChallenge category -->
                    {{-- @if($category == "Physically Challenge")
                        @foreach($physicallyChallengedUsers as $physicallyChallengedUser)
                            <tr>
                                <td>{{ $physicallyChallengedUser->id }}</td>
                                <td>{{ $physicallyChallengedUser->name }}</td>
                                <!-- Add other columns as needed -->
                                <td>Physically Handicapped</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif --}}
                </tbody>
            </table>
    </div>
    <!-- Pagination Links -->
    {{ $data->links() }}
</div>