<?php

namespace Tests\Feature;

use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\DivisionPolitica;
use App\Models\Localidad;
use App\Models\Lugar;
use App\Models\LugaresCategoria;
use App\Models\Pais;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LugarTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_lugares_can_be_created()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory()->create();
        Continente::factory()->create();
        Pais::factory()->create();
        DivisionPolitica::factory()->create();
        LugaresCategoria::factory()->create();
        Localidad::factory()->create();
        $response = $this->actingAs($user)->post('/lugares', [
            'nombre' => 'nombre de prueba',
            'direccion' => 'dirección de prueba',
            'localidad' => Localidad::all()->random()->nombre,
            'categoria_id' => LugaresCategoria::all()->random()->categoria_id,
        ]);
        $this->assertCount(1, Lugar::all()); // Fue Creado
        $lugar = Lugar::first();
        $this->assertEquals($lugar->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/lugares/'.$lugar->slug); // Funciona la redirección
    }

    public function test_lugares_item_can_be_shown()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory()->create();
        Continente::factory()->create();
        Pais::factory()->create();
        DivisionPolitica::factory()->create();
        Localidad::factory()->create();
        LugaresCategoria::factory()->create();
        $lugar = Lugar::factory()->create();
        $response = $this->actingAs($user)->get('/lugares/'.$lugar->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('lugares.show'); // Se está mostrando la vista correcta
        $lugar = Lugar::first();
        $response->assertViewHas('lugar', $lugar); // Tiene el elemento creado
    }

    public function test_lugares_can_be_updated()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory()->create();
        Continente::factory()->create();
        Pais::factory()->create();
        DivisionPolitica::factory()->create();
        LugaresCategoria::factory()->create();
        Localidad::factory()->create();
        $lugar = Lugar::factory()->create();
        $response = $this->actingAs($user)->put('/lugares/'.$lugar->slug, [
            'nombre' => 'nombre de prueba',
            'direccion' => 'dirección de prueba',
            'localidad' => Localidad::all()->random()->nombre,
            'categoria_id' => LugaresCategoria::all()->random()->categoria_id,
        ]);
        $this->assertCount(1, Lugar::all()); // Fue Creado
        $lugar = $lugar->fresh();
        $this->assertEquals($lugar->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/lugares/'.$lugar->slug); // Funciona la redirección
    }

    public function test_lugares_can_be_deleted()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory()->create();
        Continente::factory()->create();
        Pais::factory()->create();
        DivisionPolitica::factory()->create();
        Localidad::factory()->create();
        LugaresCategoria::factory()->create();
        $lugar = Lugar::factory()->create();
        $response = $this->actingAs($user)->delete('/lugares/'.$lugar->slug);
        $this->assertCount(0, Lugar::all()); // Fue Eliminado
        $response->assertRedirect('/lugares'); // Funciona la redirección
    }

    public function test_lugares_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory()->create();
        Continente::factory()->create();
        Pais::factory()->create();
        DivisionPolitica::factory()->create();
        Localidad::factory()->create();
        LugaresCategoria::factory()->create();
        Lugar::factory(3)->create();
        $response = $this->actingAs($user)->get('/lugares');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('lugares.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('lugares', function ($lugares) {
            return $lugares->contains(Lugar::first());
        }); // Tiene los elementos creados
    }

    public function test_lugares_nombre_is_required()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory()->create();
        Continente::factory()->create();
        Pais::factory()->create();
        DivisionPolitica::factory()->create();
        LugaresCategoria::factory()->create();
        Localidad::factory()->create();
        $response = $this->actingAs($user)->post('/lugares', [
            'nombre' => '',
            'direccion' => 'dirección de prueba',
            'localidad' => Localidad::all()->random()->nombre,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Lugar::all()); // No fue Creado
    }
}
