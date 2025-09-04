<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class UnitController extends Controller
{

    private $rules = [
        'name' => 'required|string|min:3|max:100'
    ];

    private $traductionAttributes = [
        'name' => 'nombre'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return response()->json($units, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->applyValidator($request, $this->rules, $this->traductionAttributes);
        if(!empty($data)){
            return $data;
        }
        $unit = Unit::create($request->all());
        $response = [
            'message' => 'Registro creado exitosamente',
            'unit' => $unit
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return response()->json($unit, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $data = $this->applyValidator($request, $this->rules, $this->traductionAttributes);
        if(!empty($data)){
            return $data;
        }
        $unit ->update($request->all());
        $response = [
            'message' => 'Registro actualizado exitosamente',
            'unit' => $unit
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        $response = [
            'message' => 'Registro eliminado exitosamente'
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
