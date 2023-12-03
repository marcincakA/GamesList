<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    function viewGames() {
        return view('gamesList');
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
        if ($user && $user->isAdmin()) {
            $incomingFields = $request->validate([
                'title' => ['required'], //nedavam unique, ani ziadne ine obmedzenia, boh zna jake hry existuju
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
            return redirect('/');
        }
    }
}
