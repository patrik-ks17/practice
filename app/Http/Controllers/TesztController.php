<?php

namespace App\Http\Controllers;

use App\Models\Family;
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
        $surnames = Family::all();
        return view('pages.names', compact('names', 'surnames'));
    }

    public function surnames() {
        $surnames = Family::all();
        return view('pages.surnames', compact('surnames'));
    }

    public function nameStore(Request $request) {
        $nameRecord = new Name();
        $nameRecord->name = $request->name;
        $nameRecord->family_id = $request->family;
        $nameRecord->save();

        return back()->with('success', 'Name added');
    }

    public function familyStore(Request $request) {
        $familyRecord = new Family();
        $familyRecord->surname =$request->name;
        $familyRecord->save();

        return back()->with('success', 'Family added');
    }

    public function nameDestroy(Name $name) {
        $name->delete();

        return back()->with('success', 'Name Deleted');
    }

    public function familyDestroy(Family $name) {
        $name->delete();

        return back()->with('success', 'Family Deleted');
    }
}
