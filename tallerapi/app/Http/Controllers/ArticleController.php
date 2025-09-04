<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{

    private $rules = [
        'name' => 'required|string|min:3|max:100',
        'quantity' => 'required|numeric|min:1|max:9999999999',
        'photo' => 'max:255',
        'technical_sheet' => 'mimes:pdf|max:5120',
        'presentation_id' => 'max:9999999999999999999',
        'category_id' => 'max:9999999999999999999',
        'supplier_id' => 'max:9999999999999999999',
        'unit_id' => 'max:9999999999999999999'
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'quantity' => 'cantidad',
        'min_quantity' => 'cantidad minima',
        'photo' => 'foto',
        'technical_sheet' => 'ficha técnica',
        'presentation_id' => 'presentación',
        'category_id' => 'categoría',
        'supplier_id' => 'proveedor',
        'unit_id' => 'unidad'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $articles->load(['presentation','category','supplier','unit']);
        return response()->json($articles,Response::HTTP_OK);
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
        $article = Article::create($request->all());
        $response = [
            'message' => 'Artículo creado exitosamente',
            'article' => $article
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load(['presentation','category','supplier','unit']);
        return response()->json($article,Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $data = $this->applyValidator($request, $this->rules, $this->traductionAttributes);
        if (!empty($data)) {
            return $data;
        }
        $article->update($request->all());
        $response = [
            'message' => 'Artículo actualizado exitosamente',
            'article' => $article
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        $response = [
            'message' => 'Artículo eliminado exitosamente',
            'article' => $article
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
