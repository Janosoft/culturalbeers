<?php

namespace Tests\Feature;

use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\DivisionPolitica;
use App\Models\Localidad;
use App\Models\Pais;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco
    
    public function test_usuarios_can_be_created()
    {
        $this->withoutExceptionHandling();

        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        $personas= Persona::factory(2)->create();
        $response = $this->post('/usuarios', [
            'email' => 'EMAIL@gmail.com',
            'password' => '1234567890',
            'persona_id' => $personas->random()->persona_id,
        ]);
        $this->assertCount(1, Usuario::all()); // Fue Creado
        $usuario = Usuario::first();
        $this->assertEquals($usuario->email, 'email@gmail.com'); // El email es correcto y fue convertido
        $this->assertEquals($usuario->password, md5('1234567890')); // El password es correcto y fue codificado
        $response->assertRedirect('/usuarios/' . $usuario->slug); // Funciona la redirección
    }

    public function test_usuarios_item_can_be_shown()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        Persona::factory(2)->create();
        $usuario = Usuario::factory()->create();
        $response = $this->get('/usuarios/' . $usuario->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('usuarios.show'); // Se está mostrando la vista correcta
        $usuario = Usuario::first();
        $response->assertViewHas('usuario', $usuario); // Tiene el elemento creado
    }

    public function test_usuarios_can_be_updated()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        $personas= Persona::factory(2)->create();
        $usuario = Usuario::factory()->create();
        $response = $this->put('/usuarios/' . $usuario->slug, [
            'email' => 'EMAIL@gmail.com',
            'password' => '1234567890',
            'persona_id' => $personas->random()->persona_id,
        ]);
        $this->assertCount(1, Usuario::all()); // Fue Creado
        $usuario = $usuario->fresh();
        $this->assertEquals($usuario->email, 'email@gmail.com'); // El email es correcto y fue convertido
        $this->assertEquals($usuario->password, md5('1234567890')); // El password es correcto y fue codificado
        $response->assertRedirect('/usuarios/' . $usuario->slug); // Funciona la redirección
    }

    public function test_usuarios_can_be_deleted()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        Persona::factory(2)->create();
        $usuario = Usuario::factory()->create();
        $response = $this->delete('/usuarios/' . $usuario->slug);
        $this->assertCount(0, Usuario::all()); // Fue Eliminado
        $response->assertRedirect('/usuarios'); // Funciona la redirección
    }

    public function test_usuarios_index_can_be_shown()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        Persona::factory(2)->create();
        Usuario::factory(2)->create();
        $response = $this->get('/usuarios');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('usuarios.index'); // Se está mostrando la vista correcta
    }
}
