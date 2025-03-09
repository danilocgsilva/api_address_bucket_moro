<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto">
    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="@th_index_classes w-7/8">
                        Query string name
                    </th>
                    <th class="@th_index_classes w-1/8">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($api->queryTerms as $queryTerm)
                    <tr>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $queryTerm->term }}</p>
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            <div class="flex space-x-2 justify-center">
                                <a href="{{ route('api.terms.edit', ['api' => $api->id, 'term' => $queryTerm->id]) }}"
                                    class="text-indigo-600 hover:text-indigo-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                </a>
                                <a 
                                    href="javascript:void(0)"
                                    class="text-red-600 hover:text-red-900"
                                    data-term-id="{{ $queryTerm->id }}"
                                    onclick="javascript:deleteQueryTerm(this)"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
