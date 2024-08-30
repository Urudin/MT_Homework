@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Pets</h1>

        <form action="{{ route('pets.index') }}" method="GET" class="mb-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Species Filter -->
                <div>
                    <label for="species" class="block text-gray-700 font-bold mb-2">Filter by Species</label>
                    <select
                        id="species"
                        name="species"
                        class="border border-gray-300 rounded-lg py-2 px-4 w-full">
                        <option value="">All Species</option>
                        <option value="dog" {{ request('species') == 'dog' ? 'selected' : '' }}>Dog</option>
                        <option value="cat" {{ request('species') == 'cat' ? 'selected' : '' }}>Cat</option>
                        <option value="bird" {{ request('species') == 'bird' ? 'selected' : '' }}>Bird</option>
                        <option value="other" {{ request('species') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Status Filter -->
                <div>
                    <label for="status" class="block text-gray-700 font-bold mb-2">Filter by Status</label>
                    <select
                        id="status"
                        name="status"
                        class="border border-gray-300 rounded-lg py-2 px-4 w-full">
                        <option value="">All Statuses</option>
                        <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="adopted" {{ request('status') == 'adopted' ? 'selected' : '' }}>Adopted</option>
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                    Search
                </button>
            </div>
        </form>


        <a
            href="{{ route('pets.create') }}"
            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300 mb-4 inline-block">
            Add Pet
        </a>

        @if ($pets->count())
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b border-gray-200 text-left">ID</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">Name</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">Age</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">Species</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">Breed</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">Status</th>
                        <th class="py-2 px-4 border-b border-gray-200 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pets as $pet)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $pet->id }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $pet->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $pet->age }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ ucfirst($pet->species) }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $pet->breed }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ ucfirst($pet->status) }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <a href="{{ route('pets.show', $pet) }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-600 transition duration-300">View</a>
                                <a href="{{ route('pets.edit', $pet) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-yellow-600 transition duration-300">Edit</a>
                                <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-600 transition duration-300">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $pets->links() }}
            </div>
        @else
            <p class="text-gray-600">No pets found.</p>
        @endif
    </div>
@endsection
