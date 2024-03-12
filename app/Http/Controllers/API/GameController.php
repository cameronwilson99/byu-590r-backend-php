<?php

namespace App\Http\Controllers\API;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::get();
        foreach ($games as $game) {
            $game->image = $this->getS3Url($game->image);
        }
        return $this->sendResponse($games, 'Games retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
