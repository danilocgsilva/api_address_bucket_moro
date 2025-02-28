@extends('layouts.app')

@section('title')
    Create
@endsection

@section('content')

    <div class="@inner_page_container_classes">
        <div class="w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Add new api address
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('api.store') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" required
                            class="@input_text_common_classes rounded-t-md"
                            placeholder="Name">
                    </div>
                    <div>
                        <label for="address" class="sr-only">Address</label>
                        <input id="address" name="address" type="text"
                            class="@input_text_common_classes"
                            placeholder="Address">
                    </div>
                    <div>
                        <label for="documentation" class="sr-only">Documentation</label>
                        <input id="documentation" name="documentation" type="text" required
                            class="@input_text_common_classes"
                            placeholder="Documentation link">
                    </div>
                    <div>
                        <label for="description" class="sr-only">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="@input_text_common_classes rounded-b-md"
                            placeholder="Description"></textarea>
                    </div>
                </div>

                @csrf

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection