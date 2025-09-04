<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $rules = [
        'name'     => 'required|string|min:3|max:255',
        'email'    => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'role_id'  => 'required|integer|exists:role,id',
        'status'   => 'in:ACTIVO,INACTIVO',
    ];

    private $traductionAttributes = [
        'name'                    => 'nombre',
        'email'                   => 'correo electrónico',
        'password'                => 'contraseña',
        'password_confirmation'   => 'confirmación de contraseña'
    ];


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'role_id', 'status')->get();
        return response()->json($users, Response::HTTP_OK);
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

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $response = [
            'message' => 'Usuario creado exitosamente',
            'unit'    => $user
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rulesUpdate = $this->rules;
        $rulesUpdate['email'] = 'required|string|email|max:255|unique:users,email,' . $user->id;
        unset($rulesUpdate['password']);

        $data = $this->applyValidator($request, $rulesUpdate, $this->traductionAttributes);
        if (!empty($data)) {
            return $data;
        }

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']); 
        } else {
            unset($input['password']);
        }

        $user->update($input);

        $response = [
            'message' => 'Usuario actualizado exitosamente',
            'unit'    => $user
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        $response = [
            'message' => 'Usuario eliminado exitosamente'
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
