@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')

    <div class="@inner_page_container_classes">
        <div class="w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Add new api address
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('api.update', $api->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div id="api-edit__main-form" class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" required class="@input_text_common_classes rounded-t-md"
                            placeholder="Name" value="{{ $api->name }}">
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
                        <textarea id="description" name="description" rows="4"
                            class="@input_text_common_classes rounded-b-md"
                            placeholder="Description">{{ $api->description }}</textarea>
                    </div>
                </div>

                @csrf

                <!-- <div class="flex gap-4">
                    <div class="flex-1">
                        <label for="exampleInput" class="sr-only">Example Input</label>
                        <input type="text" id="exampleInput" name="exampleInput"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                            focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter something..." />
                    </div>

                    <div class="flex-1">
                        <button type="submit"
                            class="
                            w-full 
                            px-4 
                            py-2 
                            bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Submita
                        </button>
                    </div>
                </div> -->

                <!-- <input type="text" class="w-full"> -->
                <!-- <input type="text" class="
                w-full
                px-3 py-2
                border border-gray-300 rounded-md shadow-sm
                focus:outline-none focus:ring-blue-500 focus:border-blue-500
                " placeholder="Add new query parameter" /> -->

                <button 
                id="api-edit__add-new-query-parameter"
                class="
                w-full
                px-3 py-2
                bg-blue-500
                text-white
                rounded-md
                hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                "
                type="button">Add new query parameter</button>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update
                    </button>
                </div>
            </form>





        </div>
    </div>


    <script>

        let main_form = document.getElementById("api-edit__main-form");
        
        let button_add_new_query_parameter = document.getElementById("api-edit__add-new-query-parameter");
        button_add_new_query_parameter.addEventListener("click", function() {
            let input = document.createElement("input");
            input.type = "text";
            input.className = "w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500";
            input.placeholder = "Add new query parameter";
            // document.querySelector("form").appendChild(input);
            main_form.insertAdjacentElement("afterend", input);
        });
    </script>

@endsection