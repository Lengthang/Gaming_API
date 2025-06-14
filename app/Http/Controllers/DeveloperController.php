<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Developer::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        return Developer::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $developer = Developer::findOrFail($id);
        return response()->json($developer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $developer = Developer::findOrFail($id);

        // $request->validate([
        //     'name' => 'required',
        // ]);

        $developer->update($request->all());

        return response()->json(['message' => 'Developer updated successfully', 'data' => $developer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $developer = Developer::findOrFail($id);
        $developer->delete();

        return response()->json(['message' => 'Developer deleted successfully']);
    }
}
