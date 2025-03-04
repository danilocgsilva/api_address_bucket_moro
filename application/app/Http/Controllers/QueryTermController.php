<?php

namespace App\Http\Controllers;

use App\Models\QueryTerm;
use Illuminate\Http\Request;
use App\Models\Api;
use Illuminate\View\View;

class QueryTermController extends Controller
{
    public function index()
    {
    }

    public function create(): View
    {
        return view('fetchingquery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'term' => 'required|string|max:255',
        ]);

        $queryString = new QueryTerm();
        $queryString->term = $request->input('term');
        $queryString->api_id = $request->input('api_id');
        $queryString->save();

        return redirect()->route('api.show', ['api' => $queryString->api_id])
            ->with('success', 'Query string created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(QueryTerm $queryString)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Api $api, QueryTerm $term)
    {
        return view('models.queryterm.edit', [
            'api' => $api, 'queryString' => $term
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Api $api, QueryTerm $term)
    {
        $validatedData = $request->validate([
            'term' => 'string|max:255',
        ]);

        $term->update($validatedData);
        return redirect()
            ->route('api.edit', ["api" => $api->id])
            ->with('success', 'API updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Api $api, QueryTerm $term)
    {
        $term->delete();
        return redirect()->route('api.edit', ["api" => $api->id])
            ->with('success', 'Query string deleted successfully.');
    }
}
