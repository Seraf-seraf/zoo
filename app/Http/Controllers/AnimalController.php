<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request, Animal $animal)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate($animal->rules(), $animal->messages());
            $animal->fill($validatedData)->save();

            return redirect(route('animals'));
        }

        return view('components.animals.add');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Animal $animal)
    {
        if (!$animal::find($id)) {
            return redirect(404);
        }
        return view('components.animals.view', ['animal' => $animal::find($id)]);
    }

    public function destroy(string $id, Animal $animal)
    {
        $animal = $animal::withTrashed()->find($id)->first();

        if (!$animal || $animal->trashed()) {
            return redirect(route('animals'));
        }

        $animal::find($id)->delete();

        return redirect(route('animals'));
    }
}
