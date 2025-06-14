<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Platform::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        return Platform::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $platform = Platform::findOrFail($id);
        return response()->json($platform);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $platform = Platform::findOrFail($id);

        // $request->validate([
        //     'name' => 'required',
        // ]);

        $platform->update($request->all());

        return response()->json(['message' => 'Platform updated successfully', 'data' => $platform]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();

        return response()->json(['message' => 'Platform deleted successfully']);
    }
}
