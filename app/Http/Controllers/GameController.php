<?php

namespace App\Http\Controllers;

use App\Models\Games;

class GameController extends Controller
{
    public function index($slug)
    {
        $game = Games::where('slug', $slug)->first();
        return View('game', ['game' => $game]);
    }
}
