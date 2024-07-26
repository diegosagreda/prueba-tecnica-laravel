<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRequest;

class RegistroController extends Controller
{
    public function registrar(UserRequest $request): JsonResponse
    {
        try {
            // Crear el usuario
            $user = User::create([
                'name' => $request->nombre,
                'email' => $request->correo,
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['mensaje' => 'Usuario registrado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Hubo un error al registrar el usuario'], 500);
        }
    }
}
