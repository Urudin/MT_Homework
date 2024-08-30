@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Edit Pet</h1>

        <form action="{{ route('pets.update', $pet) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $pet->name) }}" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
            </div>

            <div class="mb-4">
                <label for="age" class="block text-gray-700 font-bold mb-2">Age</label>
                <input type="number" id="age" name="age" value="{{ old('age', $pet->age) }}" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
            </div>

            <div class="mb-4">
                <label for="species" class="block text-gray-700 font-bold mb-2">Species</label>
                <select id="species" name="species" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
                    <option value="dog" {{ old('species', $pet->species) == 'dog' ? 'selected' : '' }}>Dog</option>
                    <option value="cat" {{ old('species', $pet->species) == 'cat' ? 'selected' : '' }}>Cat</option>
                    <option value="bird" {{ old('species', $pet->species) == 'bird' ? 'selected' : '' }}>Bird</option>
                    <option value="other" {{ old('species', $pet->species) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="breed" class="block text-gray-700 font-bold mb-2">Breed</label>
                <input type="text" id="breed" name="breed" value="{{ old('breed', $pet->breed) }}" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="border border-gray-300 rounded-lg py-2 px-4 w-full">{{ old('description', $pet->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
                <select id="status" name="status" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
                    <option value="available" {{ old('status', $pet->status) == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="adopted" {{ old('status', $pet->status) == 'adopted' ? 'selected' : '' }}>Adopted</option>
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Update Pet</button>
                <a href="{{ route('pets.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">Back To List</a>
            </div>
        </form>
    </div>
@endsection
