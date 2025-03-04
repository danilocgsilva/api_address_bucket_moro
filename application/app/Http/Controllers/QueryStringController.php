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
        $newQueryString = new QueryString();
        $api->queryStrings()->save($newQueryString);

        $newQueryStringQueryTerm = new QueryStringQueryTerm();
        $newQueryStringQueryTerm->query_term_id = $request->query_term;
        $newQueryStringQueryTerm->query_string_id = $newQueryString->id;
        $newQueryStringQueryTerm->save();

        return redirect()
            ->route('api.show', ["api" => $api->id])
            ->with('success', 'Query string just added.');
    }

    public function edit(Api $api, Request $request)
    {
    }

    public function destroy(Api $api, QueryString $querystring)
    {
        foreach ($querystring->queryStringQueryTerm as $queryTerm) {
            $queryTerm->delete();
        }
        $querystring->delete();
        return redirect()->route('api.edit', [
            "api" => $api->id
        ]);
    }
}
