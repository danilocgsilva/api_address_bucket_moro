<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api;
use Illuminate\View\View;
use App\Models\QueryString;
use Database\Repositories\QueryStringRepository;

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

    public function store(Api $api, Request $request, QueryStringRepository $queryStringRepository)
    {
        $termId = $request->query_term;

        $queryStringRepository->addTerm($api, (int) $termId);

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
