<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupplierController extends Controller
{

    private $rules = [
        'name' => 'required|string|min:3|max:100',
        'phone' => 'required|string|min:3|max:20'
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'phone' => 'teléfono'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers, Response::HTTP_OK);
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
        $supplier = Supplier::create($request->all());
        $response = [
            'message' => 'Proveedor creado exitosamente',
            'supplier' => $supplier
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return response()->json($supplier,Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $data = $this->applyValidator($request, $this->rules, $this->traductionAttributes);
        if (!empty($data)) {
            return $data;
        }
        $supplier->update($request->all());
        $response = [
            'message' => 'Proveedor actualizado exitosamente',
            'supplier' => $supplier
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        $response = [
            'message' => 'Proveedor eliminado exitosamente',
            'supplier' => $supplier
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
