@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Add New Pet</h1>

        <form action="{{ route('pets.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
            </div>

            <div class="mb-4">
                <label for="age" class="block text-gray-700 font-bold mb-2">Age</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
            </div>

            <div class="mb-4">
                <label for="species" class="block text-gray-700 font-bold mb-2">Species</label>
                <select id="species" name="species" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
                    <option value="dog" {{ old('species') == 'dog' ? 'selected' : '' }}>Dog</option>
                    <option value="cat" {{ old('species') == 'cat' ? 'selected' : '' }}>Cat</option>
                    <option value="bird" {{ old('species') == 'bird' ? 'selected' : '' }}>Bird</option>
                    <option value="other" {{ old('species') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="breed" class="block text-gray-700 font-bold mb-2">Breed</label>
                <input type="text" id="breed" name="breed" value="{{ old('breed') }}" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="border border-gray-300 rounded-lg py-2 px-4 w-full">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
                <select id="status" name="status" class="border border-gray-300 rounded-lg py-2 px-4 w-full" required>
                    @foreach(\App\Models\Pet::STATUSES as $status)
                    <option value="available" {{ old('status') == $status ? 'selected' : '' }}>{{\Illuminate\Support\Str::ucfirst($status)}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300">Add Pet</button>
                <a href="{{ route('pets.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">Cancel</a>
            </div>
        </form>
    </div>
@endsection
