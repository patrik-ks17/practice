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
        $family = Family::all();
        return view('pages.names', compact('names', 'family'));
    }

    public function surnames() {
        $family = Family::all();
        return view('pages.surnames', compact('family'));
    }

    public function nameStore(Request $request) {
        $validated = $request->validate([
            'name' => 'required|alpha|min:2|max:20',
            'family_id' => 'required'
        ]);
        Name::create($validated);

        return back()->with('success', 'Name added');
    }

    public function familyStore(Request $request) {
        $validated = $request->validate([
            'surname' => 'required|alpha|min:2|max:20'
        ]);
        Family::create($validated);
        // $familyRecord = new Family();
        // $familyRecord->surname =$request->surname;
        // $familyRecord->save();

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
