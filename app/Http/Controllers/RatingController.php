<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        return view('rating.rating', compact('ratings'));
    }

    public function create()
    {
        return view('rating.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'nilai' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:255',
        ]);

        Rating::create($request->all());

        return redirect()->route('rating.index')->with('success', 'Rating berhasil ditambahkan.');
    }

    public function edit(Rating $rating)
    {
        return view('rating.edit', compact('rating'));
    }

    public function update(Request $request, Rating $rating)
    {
        $request->validate([
            'id_user' => 'required',
            'nilai' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:255',
        ]);

        $rating->update($request->all());

        return redirect()->route('rating.index')->with('success', 'Rating berhasil diperbarui.');
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();
        return redirect()->route('rating.index')->with('success', 'Rating berhasil dihapus.');
    }

}
