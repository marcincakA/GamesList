<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    function viewGames() {
        $games = Game::all();
        return view('gamesList', ['games' => $games]);
    }

    function deleteGame(Game $game) {
        if(auth()->user()->isAdmin) {
            $game->delete();
        }
        return redirect('/');
    }
    function redirect_to_addGame() {
        if (auth()->user()->isAdmin) {
            return view('addGame');
        }
        return redirect('/');
    }

    function add_Game(Request $request)
    {
        $user = auth()->user();
        if ($user && $user->isAdmin) {
            $incomingFields = $request->validate([
                'title' => ['required'], //nedavam unique, ani ziadne ine obmedzenia, boh zna jake hry existuju, ak sa omylom pridaju rovnake treba odstranit rucne
                'publisher' => ['required'],
                'popis' => ['required', 'min:10'],
                'developer' => 'sometimes',
                'category1' => 'sometimes',
                'category2' => 'sometimes',
                'category3' => 'sometimes',
                'image' => 'sometimes'
            ]);

            //ak ma pristup iba admin je toto potrebne?
            foreach ($incomingFields as $key => $value) {
                $incomingFields[$key] = strip_tags($value);
            }

            Game::create($incomingFields);
        }

        return view('welcome');


    }

    function showEditScreen(Game $game) {
        if (auth()->user()?->isAdmin) {
            return view('editGame', ['game' => $game]);
        }
        return redirect('/');
    }

    function updateGame(Request $request, Game $game) {
        $incomingFields = $request->validate([
            'title' => ['required'], //nedavam unique, ani ziadne ine obmedzenia, boh zna jake hry existuju, ak sa omylom pridaju rovnake treba odstranit rucne
            'publisher' => ['required'],
            'popis' => ['required', 'min:10'],
            'developer' => 'sometimes',
            'category1' => 'sometimes',
            'category2' => 'sometimes',
            'category3' => 'sometimes',
            'image' => 'sometimes'
        ]);

        foreach ($incomingFields as $key => $value) {
            $incomingFields[$key] = strip_tags($value);
        }

        $game->update($incomingFields);
        return redirect('/');
    }

    function showGamePage($id) {
        $game = Game::find($id);
        if (!$game){
            abort(404);
        }
        return view('gamePage', ['game' => $game]);
    }

}
