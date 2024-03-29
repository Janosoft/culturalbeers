<?php

namespace Tests\Feature;

use App\Models\Continente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContinenteTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_continentes_can_be_created()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/continentes', [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, Continente::all()); // Fue Creado
        $continente = Continente::first();
        $this->assertEquals($continente->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/continentes/'.$continente->slug); // Funciona la redirección
    }

    public function test_continentes_item_can_be_shown()
    {
        $user = User::factory()->create();
        $continente = Continente::factory()->create();
        $response = $this->actingAs($user)->get('/continentes/'.$continente->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('continentes.show'); // Se está mostrando la vista correcta
        $continente = Continente::first();
        $response->assertViewHas('continente', $continente); // Tiene el elemento creado
    }

    public function test_continentes_can_be_updated()
    {
        $user = User::factory()->create();
        $continente = Continente::factory()->create();
        $response = $this->actingAs($user)->put('/continentes/'.$continente->slug, [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, Continente::all()); // Fue Creado
        $continente = $continente->fresh();
        $this->assertEquals($continente->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/continentes/'.$continente->slug); // Funciona la redirección
    }

    public function test_continentes_can_be_deleted()
    {
        $user = User::factory()->create();
        $continente = Continente::factory()->create();
        $response = $this->actingAs($user)->delete('/continentes/'.$continente->slug);
        $this->assertCount(0, Continente::all()); // Fue Eliminado

        $response->assertRedirect('/continentes'); // Funciona la redirección
    }

    public function test_continentes_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        Continente::factory(3)->create();
        $response = $this->actingAs($user)->get('/continentes');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('continentes.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('continentes', function ($continentes) {
            return $continentes->contains(Continente::first());
        }); // Tiene los elementos creados
    }

    public function test_continentes_nombre_is_required()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/continentes', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Continente::all()); // No fue Creado
    }
}
