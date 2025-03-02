@extends('layouts.app')

@section('title')
    Create
@endsection

@section('content')
    <div class="@inner_page_container_classes">
        <div class="w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Add new query string for {{ $api->name }}
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('api.querystring.store', $api->id) }}" method="POST">

                <div class="flex flex-wrap">
                    <div class="w-full md:w-2/3 p-2">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div>
                                <label for="term" class="sr-only">Name</label>
                                <input id="term" name="term" type="text" required
                                    class="@input_text_common_classes rounded-md" placeholder="Term">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="api_id" value="{{ $api->id }}">

                    @csrf

                    <div class="w-full md:w-1/3 p-2">
                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
