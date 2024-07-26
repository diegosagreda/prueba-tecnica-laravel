<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    /**
     * Registrar un nuevo usuario.
     *
     * @param  UserRequest  $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        try {
            $user = User::create([
                'name' => $request->nombre,
                'email' => $request->correo,
                'password' => Hash::make($request->password),
            ]);

            return response()->json(['mensaje' => 'Usuario registrado exitosamente'], 201);
        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Hubo un error al registrar el usuario'], 500);
        }
    }
}
