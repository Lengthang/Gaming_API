<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Game::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'developer_id' => 'required|exists:developers,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $game = Game::create($request->only([
            'title', 'genre', 'rating', 'class', 'developer_id', 'publisher_id'
        ]));

        if ($request->has('platform_ids')) {
            $game->platforms()->attach($request->platform_ids);
        }

        return $game->load(['developer', 'publisher', 'platforms']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Game::with(['developer', 'publisher', 'platforms'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $game = Game::findOrFail($id);
        $game->update($request->only([
            'title', 'genre', 'rating', 'class', 'developer_id', 'publisher_id'
        ]));

        if ($request->has('platform_ids')) {
            $game->platforms()->sync($request->platform_ids);
        }

        return $game->load(['developer', 'publisher', 'platforms']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = Game::findOrFail($id);
        $game->platforms()->detach();
        $game->delete();

        return response()->json(['message' => 'Game deleted']);
    }
}
