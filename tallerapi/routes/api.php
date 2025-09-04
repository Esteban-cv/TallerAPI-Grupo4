<?php

use App\Http\Controllers\UnitController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('unit', UnitController::class);

Route::apiResource('article', ArticleController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('entry', EntryController::class);
Route::apiResource('issue', IssueController::class);
Route::apiResource('person', PersonController::class);
Route::apiResource('presentation', PresentationController::class);
Route::apiResource('role', RoleController::class);
Route::apiResource('supplier', SupplierController::class);
Route::apiResource('unit', UnitController::class);
Route::apiResource('user', UserController::class);
