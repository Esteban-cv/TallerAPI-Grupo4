<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IssueController extends Controller
{
    private $rules = [
        'sena_code' => 'max:70',
        'date_issue' => 'required|date|date_format:Y-m-d',
        'quantity' => 'required|numeric|min:1|max:9999999999',
        'observations' => 'string|min:3|max:100',
        'article_id' => 'required|numeric|min:1|max:99999999999999999999',
        'person_id' => 'required|numeric|min:1|max:99999999999999999999'
    ];

    private $traductionAttributes = [
        'sena_code' => 'codigo sena',
        'date_issue' => 'fecha salida',
        'quantity' => 'cantidad',
        'observations' => 'observaciones',
        'article_id' => 'artículo',
        'person_id' => 'persona'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::all();
        $issues->load(['article', 'person']);
        return response()->json($issues, Response::HTTP_OK);
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

        $issue = Issue::create($request->all());
        $response = [
            'message' => 'Salida creada exitosamente',
            'issue' => $issue
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        $issue->load(['article', 'person']);
        return response()->json($issue, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $data = $this->applyValidator($request, $this->rules, $this->traductionAttributes);
        if (!empty($data)) {
            return $data;
        }

        $issue->update($request->all());
        $response = [
            'message' => 'Salida actualizada exitosamente',
            'issue' => $issue
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        $data = [
            'message' => 'Salida eliminada exitosamente',
            'issue' => $issue
        ];

        return response()->json($data, Response::HTTP_OK);
    }
}
