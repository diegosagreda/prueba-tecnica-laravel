<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test de registro de usuario exitoso.
     *
     * @return void
     */
    public function test_registrar_usuario_exitoso(): void
    {
        $response = $this->postJson('/registrar', [
            'nombre' => 'John Doe',
            'correo' => 'johndoe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        if ($response->status() !== 201) {
            dd($response->json());
        }

        $response->assertStatus(201)
                 ->assertJson(['mensaje' => 'Usuario registrado exitosamente']);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);

        $user = User::where('email', 'johndoe@example.com')->first();
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    /**
     * Test de error en el registro de usuario.
     *
     * @return void
     */
    public function test_registrar_usuario_con_error(): void
    {
        // Error  correo duplicado
        User::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->postJson('/registrar', [
            'nombre' => 'Jane Doe',
            'correo' => 'janedoe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(422)
                 ->assertJsonStructure(['message', 'errors' => ['correo']])
                 ->assertJsonFragment(['correo' => ['The correo has already been taken.']]);
    }
}
