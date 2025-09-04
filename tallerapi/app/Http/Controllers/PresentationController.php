<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PresentationController extends Controller
{
    private $rules = [
        'description' => 'required|string|min:3|max:100'
    ];

    private $traductionAttributes = [
        'description' => 'descripcion'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentations = Presentation::all();
        return response()->json($presentations, Response::HTTP_OK);
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

        $presentation = Presentation::create($request->all());
        $response = [
            'message' => 'Presentación creada exitosamente',
            'presentation' => $presentation
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Presentation $presentation)
    {
        return response()->json($presentation, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presentation $presentation)
    {
        $data = $this->applyValidator($request, $this->rules, $this->traductionAttributes);
        if (!empty($data)) {
            return $data;
        }

        $presentation->update($request->all());
        $response = [
            'message' => 'Presentación actualizada exitosamente',
            'presentation' => $presentation
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presentation $presentation)
    {
        $presentation->delete();
        $data = [
            'message' => 'Presentación eliminada exitosamente',
            'presentations' => $presentation
        ];

        return response()->json($data, Response::HTTP_OK);
    }
}
