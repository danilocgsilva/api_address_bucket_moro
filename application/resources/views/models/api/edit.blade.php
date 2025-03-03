@extends('layouts.app')

@section('title')
    Edit an api
@endsection

@section('content')
    <div class="@inner_page_container_classes">
        <div class="w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <form class="mt-8 space-y-6" action="{{ route('api.update', $api->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div id="api-edit__main-form" class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" required
                            class="@input_text_common_classes rounded-t-md" placeholder="Name" value="{{ $api->name }}">
                    </div>
                    <div>
                        <label for="address" class="sr-only">Address</label>
                        <input id="address" name="address" type="text" class="@input_text_common_classes"
                            placeholder="Address" value="{{ $api->address }}">
                    </div>
                    <div>
                        <label for="documentation" class="sr-only">Documentation</label>
                        <input id="documentation" name="documentation" type="text" required
                            class="@input_text_common_classes" placeholder="Documentation link"
                            value="{{ $api->documentation }}">
                    </div>
                    <div>
                        <label for="description" class="sr-only">Description</label>
                        <textarea id="description" name="description" rows="4" class="@input_text_common_classes rounded-b-md"
                            placeholder="Description">{{ $api->description }}</textarea>
                    </div>
                </div>

                <h3>Query strings:</h3>
                <div class="mb-4">
                    @include('models.api._query_strings')
                </div>

                @csrf

                <div class="flex flex-wrap">
                    <div class="w-full md:w-2/3 p-2">
                        <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update basic data for api entry
                        </button>
                    </div>

                    <div class="w-full md:w-1/3 p-2">
                        <a href="{{ route('api.querystring.create', $api->id) }}"
                            class="w-full justify-center inline-flex items-center px-6 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-700">
                            Add new query string
                        </a>
                    </div>
                </div>
            </form>

            <div class="flex flex-wrap">
                <div class="w-full p-2">
                    <a href="{{ route('api.querystring.create', ['api' => $api]) }}"
                        class="inline-flex items-center px-6 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-700 justify-center w-full">
                        Create a query string
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
