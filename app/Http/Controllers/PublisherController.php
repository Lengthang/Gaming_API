<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Publisher::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        return Publisher::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publisher = Publisher::findOrFail($id);
        return response()->json($publisher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publisher = Publisher::findOrFail($id);

        // $request->validate([
        //     'name' => 'required',
        // ]);

        $publisher->update($request->all());

        return response()->json(['message' => 'Publisher updated successfully', 'data' => $publisher]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return response()->json(['message' => 'Publisher deleted successfully']);
    }
}
