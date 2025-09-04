<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonController extends Controller
{

    private $rules = [
        'phone' => 'max:255',
        'name' => 'required|string|min:3|max:255'
    ];

    private $traductionAttributes = [
        'document' => 'documento',
        'phone' => 'telefono',
        'name' => 'nombre'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::all();
        return response()->json($people,Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->applyValidator($request, $this->rules, $this->traductionAttributes);
        if (!empty($data)) {
            return $data;
        }
        $person = Person::create($request->all());
        $response = [
            'message' => 'Persona creada exitosamente',
            'person' => $person
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return response()->json($person,Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $data = $this->applyValidator($request, $this->rules, $this->traductionAttributes);
        if (!empty($data)) {
            return $data;
        }
        $person->update($request->all());
        $response = [
            'message' => 'Persona actualizada exitosamente',
            'person' => $person
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        $response = [
            'message' => 'Persona eliminada exitosamente',
            'person' => $person
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
