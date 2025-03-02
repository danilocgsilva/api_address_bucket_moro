<?php

namespace App\Http\Controllers;

use App\Models\QueryString;
use Illuminate\Http\Request;
use App\Models\Api;

class QueryStringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('models.query_string.create', [
            'api' => Api::findOrFail((int) $request->route('api'))
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'term' => 'required|string|max:255',
        ]);

        $queryString = new QueryString();
        $queryString->term = $request->input('term');
        $queryString->api_id = $request->input('api_id');
        $queryString->save();

        return redirect()->route('api.show', ['api' => $queryString->api_id])
            ->with('success', 'Query string created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(QueryString $queryString)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QueryString $queryString)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QueryString $queryString)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QueryString $queryString)
    {
        //
    }
}
