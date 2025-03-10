@extends('layouts.app')

@section('title')
    Edit an api
@endsection

@section('content')
    <form id="delete_query_term_form" method="POST">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function deleteQueryTerm(element) {
            if (confirm('Are you sure you want to delete this item?')) {
                let termId = element.dataset.termId;
                let deleteQueryForm = document.getElementById('delete_query_term_form');
                deleteQueryForm.action = `/api/{{ $api->id }}/terms/${termId}`;
                deleteQueryForm.submit();
            }
        }
    </script>

    <form id="delete_query_string_form" method="POST">
        @csrf
        @method('DELETE')
    </form>


    <script>
        function deleteQueryString(element) {
            if (confirm('Are you sure you want to delete this item?')) {
                let queryStringId = element.dataset.queryStringId;
                let deleteQueryStringForm = document.getElementById('delete_query_term_form');
                deleteQueryStringForm.action = `/api/{{ $api->id }}/querystring/${queryStringId}`;
                deleteQueryStringForm.submit();
            }
        }
    </script>

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

                <h3>Query terms:</h3>
                <div class="mb-4">
                    @include('models.api._query_terms')
                </div>

                <h3>Paths with strings:</h3>

                @php
                    $headers = ['Query Strings', 'edit'];
                    $entries = $api->queryStrings;
                    $destroyRouteParent = [
                        'api' => $api->id,
                    ];
                @endphp

                <x-api.edit.edit-entries-table :headers="$headers" :entries="$entries" destroy-route="api.querystring.destroy"
                    :destroy-route-parent="$destroyRouteParent" />

                @csrf

                <div class="flex flex-wrap">
                    <div class="w-full md:w-2/3 p-2">
                        <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update basic data for api entry
                        </button>
                    </div>

                    <div class="w-full md:w-1/3 p-2">
                        <a href="{{ route('api.terms.create', $api->id) }}"
                            class="w-full justify-center inline-flex items-center px-6 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-700">
                            Add new query term
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
