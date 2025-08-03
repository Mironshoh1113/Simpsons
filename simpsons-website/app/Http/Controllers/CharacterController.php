<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();
        return view('characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'voice_actor' => 'nullable',
            'first_appearance' => 'nullable',
            'occupation' => 'nullable',
            'family' => 'nullable'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/characters'), $imageName);

        Character::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'voice_actor' => $request->voice_actor,
            'first_appearance' => $request->first_appearance,
            'occupation' => $request->occupation,
            'family' => $request->family
        ]);

        return redirect()->route('characters.index')->with('success', 'Qahramon muvaffaqiyatli qo\'shildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        return view('characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'voice_actor' => 'nullable',
            'first_appearance' => 'nullable',
            'occupation' => 'nullable',
            'family' => 'nullable'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'voice_actor' => $request->voice_actor,
            'first_appearance' => $request->first_appearance,
            'occupation' => $request->occupation,
            'family' => $request->family
        ];

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/characters'), $imageName);
            $data['image'] = $imageName;
        }

        $character->update($data);

        return redirect()->route('characters.index')->with('success', 'Qahramon muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('characters.index')->with('success', 'Qahramon o\'chirildi!');
    }
}
