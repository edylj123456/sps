<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Appointments</h2>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Owner Name</th>
                <th class="py-2 px-4 border-b">Phone Number</th>
                <th class="py-2 px-4 border-b">Address</th>
                <th class="py-2 px-4 border-b">Date Schedule</th>
                <th class="py-2 px-4 border-b">Dog's Name</th>
                <th class="py-2 px-4 border-b">Breed</th>
                <th class="py-2 px-4 border-b">Age</th>
                <th class="py-2 px-4 border-b">Sex</th>
                <th class="py-2 px-4 border-b">Photo</th>
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $appointment->owner_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->owner_phone_number }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->owner_address }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->date_schedule->format('Y-m-d') }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->dog_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->dog_breed }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->dog_age }}</td>
                    <td class="py-2 px-4 border-b">{{ ucfirst($appointment->dog_sex) }}</td>
                    <td class="py-2 px-4 border-b">
                        <img src="{{ asset('storage/'.$appointment->dog_photo) }}" alt="{{ $appointment->dog_name }}" class="h-16 w-16 rounded-full object-cover">
                    </td>
                    <td class="py-2 px-4 border-b">{{ $appointment->status }}</td>
                    <td class="py-2 px-4 border-b">
                        <button wire:click="approve({{ $appointment->id }})" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Approve</button>
                        <button wire:click="decline({{ $appointment->id }})" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Decline</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
