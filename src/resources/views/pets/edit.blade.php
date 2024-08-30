@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Edit Pet</h1>

        <form action="@empty($pet) {{ route('pets.store') }} @else {{ route('pets.update', $pet) }} @endempty" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @empty($pet)
                @method('POST')
            @else
                @method('PUT')
            @endif
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $pet?->name ?? '') }}" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
            </div>

            <div class="mb-4">
                <label for="age" class="block text-gray-700 font-bold mb-2">Age</label>
                <input type="number" id="age" name="age" value="{{ old('age', $pet?->age ?? '') }}" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
            </div>

            <div class="mb-4">
                <label for="species" class="block text-gray-700 font-bold mb-2">Species</label>
                <select id="species" name="species" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
                    @foreach(App\Models\Pet::SPECIES as $species)
                        <option value="{{$species}}" {{ old('species', $pet?->species ?? '') == $species ? 'selected' : '' }}>{{\Illuminate\Support\Str::ucfirst($species)}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="breed" class="block text-gray-700 font-bold mb-2">Breed</label>
                <input type="text" id="breed" name="breed" value="{{ old('breed', $pet?->breed ?? "") }}" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="border border-gray-300 rounded-lg py-2 px-4 w-full">{{ old('description', $pet?->description ?? "") }}</textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
                <select id="status" name="status" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
                    @foreach(App\Models\Pet::STATUSES as $status)
                        <option value="{{$status}}" {{ old('status', $pet?->status ?? '') == $status ? 'selected' : '' }}>{{\Illuminate\Support\Str::ucfirst($status)}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Update Pet</button>
                <a href="{{ route('pets.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">Back To List</a>
            </div>
        </form>
    </div>
@endsection
