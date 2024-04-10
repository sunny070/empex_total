<div>
    <h1>Generate Report</h1>

    <!-- Filter Inputs -->
    <div>
        <label for="category">Category:</label>
        <select wire:model="category" id="category">
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
        <select wire:model="duration" id="duration">
            <!-- Add options for duration -->
            <option value="monthly">Monthly</option>
            <option value="half-yearly">Half-Yearly</option>
            <option value="yearly">Yearly</option>
            <option value="daily">Daily</option>
        </select>
    </div>

    <!-- Report Data -->
    <table>
        <thead>
            <tr>
                <th>Serial Number</th>
                <th>Category</th>
                <th>Qualification</th>
                <th>User ID</th>
                <th>Male</th>
                <th>Female</th>
                <th>Others</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $info)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $info->physically_challenge }}</td>
                    <td>
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
                    <!-- Adjust gender count logic based on your data structure -->

                    <td>{{ $info->user_id === }}</td>
                    <td>{{ $info->gender === 'Male'? 1 : 0  }}</td>
                    <td>{{ $info->gender === 'Female' ? 1 : 0 }}</td>
                    <td>{{ $info->gender !== 'Others' }}</td>
                    <!-- Adjust total calculation based on your data structure -->
                    <td>1</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $data->links() }}
</div>
