<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api;
use App\Models\QueryStringQueryTerm;
use Illuminate\View\View;
use App\Models\QueryString;

class QueryStringController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Api $api): View
    {
        return view('models.querystring.create', [
            'api' => $api
        ]);
    }

    public function store(Api $api, Request $request)
    {
        // query_term
        // $justCreatedQueryString = QueryString::create([
        //     "api_id" => $api->id
        // ]);
        QueryStringQueryTerm::create([
            "query_string_id" => $justCreatedQueryString->id,
            "query_term_id" => $request->query_term
        ]);

        return redirect()
            ->route('api.show', ["api" => $api->id])
            ->with('success', 'Query string just added.');
    }

    public function edit(Api $api, Request $request)
    {
    }
}
