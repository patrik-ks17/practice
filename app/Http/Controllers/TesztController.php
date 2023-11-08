<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class TesztController extends Controller
{
    public function index()
    {
        $names = ['Norris', 'Shinoda', 'Arnold', 'Hops'];
        $randomNameKey = array_rand($names, 1);
        $randomName = $names[$randomNameKey];

        return view('pages.teszt', compact('randomName'));
    }

    public function names()
    {
        $names = Name::all();
        return view('pages.names', compact('names'));
    }

    public function store(Request $request)
    {
        $nameRecord = new Name();
        $nameRecord->name = $request->name;
        $nameRecord->save();

        return back()->with('success', '');
    }
}
