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
        // Show word details
        $word = Word::find($id);

        // return a response
        if ($word){
            return response()->json($word, 200);
        } else {
            return response()->json(['message' => 'Word not found'], 404);
        }
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request

        $request->validate([
            'word' => 'required',
            'favorite' => 'required',
            'access_history' => 'required',
        ]);

        // update word data in database
        $word = Word::find($id);
        if ($word) {
            $word -> update($request->all());
            return response()->json(
                [
                    'message' => 'Word update successfully',
                    'data' => $word,
                ],200);
        } else {
            return response()->json(['message' => 'Word not found'], 404);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           // delete word
           $word = Word::find($id);
           if ($word) {
               $word -> delete();
               return response()->json(
                   [
                       'message' => 'Word deleted successfully'
                   ],200);
           } else {
               return response()->json(['message' => 'Word not found'], 404);
   
           }
    }
}
