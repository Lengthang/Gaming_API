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
            'description' => 'required|string',
            'image' => 'required|string',
            'poster' => 'required|string',
            'price' => 'required|numeric',
            'website' => 'nullable|string',
            'section_titles' => 'array',
            'section_titles.*' => 'nullable|string',
            'section_descriptions' => 'array',
            'section_descriptions.*' => 'nullable|string',
        ]);


        $game = Game::create($request->only([
            'title', 'genre', 'class', 'developer_id', 'publisher_id', 'description', 'image', 'poster', 'price', 'website'
        ]));

        if ($request->has('platform_ids')) {
            $game->platforms()->attach($request->platform_ids);
        }

        // Save multiple sections
        $sectionTitles = $request->input('section_titles', []);
        $sectionDescs = $request->input('section_descriptions', []);

        foreach ($sectionTitles as $i => $title) {
            if ($title || ($sectionDescs[$i] ?? null)) {
                $game->sections()->create([
                    'title' => $title,
                    'description' => $sectionDescs[$i] ?? '',
                ]);
            }
        }

        return $game->load(['developer', 'publisher', 'platforms', 'sections']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Game::with(['developer', 'publisher', 'platforms', 'sections'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $game = Game::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'developer_id' => 'required|exists:developers,id',
            'publisher_id' => 'required|exists:publishers,id',
            'description' => 'required|string',
            'image' => 'required|string',
            'poster' => 'required|string',
            'price' => 'required|numeric',
            'website' => 'nullable|string',
            'section_titles' => 'array',
            'section_titles.*' => 'nullable|string',
            'section_descriptions' => 'array',
            'section_descriptions.*' => 'nullable|string',
        ]);

        $game->update($request->only([
            'title', 'genre', 'class', 'developer_id', 'publisher_id', 'description', 'image', 'poster', 'price', 'website'
        ]));

        if ($request->has('platform_ids')) {
            $game->platforms()->sync($request->platform_ids);
        }

        // Delete old sections
        $game->sections()->delete();

        // Recreate submitted sections
        $sectionTitles = $request->input('section_titles', []);
        $sectionDescs = $request->input('section_descriptions', []);

        foreach ($sectionTitles as $i => $title) {
            if ($title || ($sectionDescs[$i] ?? null)) {
                $game->sections()->create([
                    'title' => $title,
                    'description' => $sectionDescs[$i] ?? '',
                ]);
            }
        }

        return $game->load(['developer', 'publisher', 'platforms', 'sections']);
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
