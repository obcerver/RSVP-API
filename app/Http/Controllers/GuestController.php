<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guest;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::orderBy('name')->get();
        return response()->json($guests);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'table_number' => 'required|string|max:255',
            'status' => 'sometimes|string|in:pending,attend',
        ]);

        $guest = Guest::create($validatedData);

        return response()->json([
            'message' => 'Guest added successfully',
            'guest' => $guest
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guest = Guest::findOrFail($id);
        return response()->json($guest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guest = Guest::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'table_number' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|in:pending,attend',
        ]);

        $guest->update($validatedData);

        return response()->json([
            'message' => 'Guest updated successfully',
            'guest' => $guest
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return response()->json([
            'message' => 'Guest deleted successfully'
        ]);
    }
}
