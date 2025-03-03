<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apis = Api::all();
        return view('models.api.index', compact('apis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.api.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'name' => 'nullable|required|string',
            'documentation' => 'required|string',
        ]);

        $api = Api::create($validatedData);
        return redirect()->route('api.index')->with('success', 'API created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Api $api)
    {
        return view('models.api.show', compact('api'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Api $api)
    {
        return view('models.api.edit', compact('api'));
    }

    public function update(Request $request, Api $api)
    {
        $validatedData = $request->validate([
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'name' => 'nullable|required|string',
            'documentation' => 'required|string',
        ]);

        $api->update($validatedData);
        return redirect()->route('api.index')->with('success', 'API updated successfully.');
    }

    public function destroy(Api $api)
    {
        $api->delete();
        return redirect()->route('api.index')->with('success', 'API deleted successfully.');
    }
}


