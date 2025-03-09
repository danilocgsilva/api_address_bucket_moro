<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api;
use App\Models\QueryStringQueryTerm;
use Illuminate\View\View;
use App\Models\QueryString;
use App\Models\QueryTerm;
use DB;

class QueryStringController extends Controller
{
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
        DB::transaction(function () use ($api, $request) {
            $newQueryString = new QueryString();
            $api->queryStrings()->save($newQueryString);

            $queryTerm = new QueryTerm();
            $queryTerm->api_id = $api->id;
            $queryTerm->term = $request->term;
            $queryTerm->save();

            $newQueryStringQueryTerm = new QueryStringQueryTerm();
            $newQueryStringQueryTerm->query_term_id = $queryTerm->id;
            $newQueryStringQueryTerm->query_string_id = $newQueryString->id;
            $newQueryStringQueryTerm->save();
        });

        return redirect()
            ->route('api.show', ["api" => $api->id])
            ->with('success', 'Query string just added.');
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
