@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">View Pet</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4">{{ $pet->name }}</h2>

            <p class="text-gray-700"><strong>Age:</strong> {{ $pet->age }} years</p>
            <p class="text-gray-700"><strong>Species:</strong> {{ ucfirst($pet->species) }}</p>
            <p class="text-gray-700"><strong>Breed:</strong> {{ $pet->breed }}</p>
            <p class="text-gray-700"><strong>Status:</strong> {{ ucfirst($pet->status) }}</p>

            @if ($pet->description)
                <p class="text-gray-700 mt-4"><strong>Description:</strong> {{ $pet->description }}</p>
            @endif

            <div class="mt-6">
                <a href="{{ route('pets.edit', $pet) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">Edit</a>
                <a href="{{ route('pets.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">Back to List</a>
            </div>
        </div>
    </div>
@endsection
