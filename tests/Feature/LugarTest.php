<?php

namespace Tests\Feature;

use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\DivisionPolitica;
use App\Models\Localidad;
use App\Models\Lugar;
use App\Models\Pais;
use App\Models\ProductoresFabricacion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LugarTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_lugares_can_be_created()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades = Localidad::factory(2)->create();
        $response = $this->post('/lugares', [
            'nombre' => 'nombre de prueba',
            'direccion' => 'dirección de prueba',
            'localidad' => $localidades->random()->nombre,
        ]);
        $this->assertCount(1, Lugar::all()); // Fue Creado
        $lugar = Lugar::first();
        $this->assertEquals($lugar->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/lugares/'.$lugar->slug); // Funciona la redirección
    }

    public function test_lugares_item_can_be_shown()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        $lugar = Lugar::factory()->create();
        $response = $this->get('/lugares/'.$lugar->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('lugares.show'); // Se está mostrando la vista correcta
        $lugar = Lugar::first();
        $response->assertViewHas('lugar', $lugar); // Tiene el elemento creado
    }

    public function test_lugares_can_be_updated()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades = Localidad::factory(2)->create();
        $lugar = Lugar::factory()->create();
        $response = $this->put('/lugares/'.$lugar->slug, [
            'nombre' => 'nombre de prueba',
            'direccion' => 'dirección de prueba',
            'localidad' => $localidades->random()->nombre,
        ]);
        $this->assertCount(1, Lugar::all()); // Fue Creado
        $lugar = $lugar->fresh();
        $this->assertEquals($lugar->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/lugares/'.$lugar->slug); // Funciona la redirección
    }

    public function test_lugares_can_be_deleted()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        $lugar = Lugar::factory()->create();
        $response = $this->delete('/lugares/'.$lugar->slug);
        $this->assertCount(0, Lugar::all()); // Fue Eliminado
        $response->assertRedirect('/lugares'); // Funciona la redirección
    }

    public function test_lugares_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        Lugar::factory(3)->create();
        $response = $this->get('/lugares');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('lugares.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('lugares', function ($lugares) {
            return $lugares->contains(Lugar::first());
        }); // Tiene los elementos creados
    }

    public function test_lugares_nombre_is_required()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades = Localidad::factory(2)->create();
        $response = $this->post('/lugares', [
            'nombre' => '',
            'direccion' => 'dirección de prueba',
            'localidad' => $localidades->random()->nombre,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Lugar::all()); // No fue Creado
    }
}
