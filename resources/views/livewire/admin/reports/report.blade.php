<div>
    <div>
        <button wire:click="resetFilters">Reset</button>
    </div>

    <!-- Filter Inputs -->
    <div class="flex items-center py-10 justify-evenly">

        <div class="">
            <label for="category">Category:</label>
            <select wire:model="category" id="category" wire:change="render">
                <option value="all">All</option>
                <option value="Mizo">Mizo</option>
                <option value="Non-Mizo">Non-Mizo</option>
                <option value="Physically Challenge">Physically Handicapped</option>
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
        

        @if($category == "Physically Challenge")
        {{-- @php
            $physicallyChallengedUsersCollection = collect($physicallyChallengedUsers);
        @endphp --}}
       <table style="border-collapse: collapse; width: 100%; text-align: center; background:#FFF py-10">
        <thead>
            <tr>
                <th style="border: 1px solid black;">Serial Number</th>
                <th style="border: 1px solid black;">Name</th>
                <th style="border: 1px solid black;">Category</th>
                <th style="border: 1px solid black;">Qualification</th>
                <th style="border: 1px solid black;">Gender</th>
                <th style="border: 1px solid black;">User ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $info)
            <tr>
                <td style="border: 1px solid black;">{{ $index + 1 }}</td>
                <td style="border: 1px solid black;">{{ $info->full_name }}</td>
                <td style="border: 1px solid black;">
                    @if ($info->userPhysicalChallenge instanceof \Illuminate\Support\Collection)
                        @foreach ($info->userPhysicalChallenge as $userPhysicalChallenge)
                            {{ $userPhysicalChallenge->physicalChallenge->name }}<br>
                        @endforeach
                    @else
                        No user physical challenges found.
                    @endif
                </td>
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
                <td style="border: 1px solid black;">{{ $info->user_id }}</td>
            </tr>
        @endforeach
        

        
        </tbody>
    </table>
    @endif
    
    
    
    
    </div>
    <!-- Pagination Links -->
    {{ $data->links() }}
</div>