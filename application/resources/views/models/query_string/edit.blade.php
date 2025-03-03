@extends('layouts.app')

@section('title')
    Edit term
@endsection

@section('content')
    <div class="@inner_page_container_classes">
        <div class="w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Edit a term from {{ $api->name }}: {{ $queryString->term }}
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('api.querystring.update', [ 'api' => $api->id, 'querystring' => $queryString->id ] ) }}" method="POST">

                <div class="flex flex-wrap">
                    <div class="w-full md:w-2/3 p-2">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div>
                                <label for="term" class="sr-only">Name</label>
                                <input id="term" name="term" type="text" required
                                    class="@input_text_common_classes rounded-md" placeholder="Term" value="{{ $queryString->term }}">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="api_id" value="{{ $api->id }}">

                    @csrf
                    @method('PUT')

                    <div class="w-full md:w-1/3 p-2">
                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <a href="{{ route('api.edit', $api->id) }}">Back to edit api</a>
        </div>
    </div>
@endsection
