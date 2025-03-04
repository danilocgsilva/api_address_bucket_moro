<!-- filepath: /var/www/resources/views/models/fetching_query/create.blade.php -->
@extends('layouts.app')

@section('title')
    Create Fetching Query for {{ $api->name }}
@endsection

@section('content')
    <div class="mb-4">

        <form action="{{ route('api.querystring.store', $api->id) }}" method="POST">
            @csrf

            <label for="query_term" class="block text-sm font-medium text-gray-700 mb-1">
                Choose an option
            </label>

            <div class="relative">
                <select id="query_term" name="query_term"
                    class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm appearance-none bg-white">
                    <option selected disabled>Select an option</option>

                    @foreach ($api->queryTerms as $queryString)
                        <option value="{{ $queryString->id }}">{{ $queryString->term }}</option>
                    @endforeach

                </select>

                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <p class="mt-1 text-sm text-gray-500">Select from the available options above</p>

            <input type="submit"
                class="w-full inline-flex items-center px-4 py-2 my-8 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                value="Create fetching query" />

        </form>

    </div>


    <script>
        document.getElementById('select-example').addEventListener('change', function(e) {
            console.log('Selected option:', e.target.value);
        });
    </script>


    </script>
@endsection
