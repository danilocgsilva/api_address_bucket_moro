@extends('layouts.app')

@section('title')
    Api: {{ $api->name }}
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">

        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Description</label>
            <p class="text-gray-900">{{ $api->description }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Address</label>
            <p class="text-gray-900">{{ $api->address ?? "No address setted yet" }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Documentation</label>
            <p class="text-gray-900">{{ $api->documentation }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">
                Query terms
            </label>
            @foreach ($api->queryTerms as $term)
                <p class="text-gray-900">{{ $term->term }}</p>
            @endforeach
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">
                Paths with query strings
            </label>
            @foreach ($api->queryStrings as $queryString)
                <p class="text-gray-900">{{ $queryString->getString() }}</p>
            @endforeach
        </div>

        <a href="{{ route('api.index') }}"
        class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Back to List
        </a>
        <a href="{{ route('api.edit', $api->id) }}"
            class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Edit
        </a>

    </div>

@endsection
