<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return 10 words for each page
        return response()->json (Word::paginate(10),200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request

        $request->validate([
            'word' => 'required',
            'favorite' => 'required',
            'access_history' => 'required',
        ]);

        // Add a new word in database

        $word = Word::create($request->all());

        return response()->json(
            [
                'message' => 'Word created successfully',
                'data' => $word,
            ],200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
