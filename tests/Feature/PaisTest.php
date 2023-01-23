<?php

namespace Tests\Feature;

use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\Pais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaisTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_paises_can_be_created()
    {
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::factory(2)->create();
        $continentes = Continente::factory(2)->create();
        $response = $this->post('/paises', [
            'nombre' => 'nombre de prueba',
            'continente_id' => $continentes->random()->continente_id,
            'divisiones_politicas_tipo_id' => $divisiones_politicas_tipo->random()->divisiones_politicas_tipo_id,
        ]);
        $this->assertCount(1, Pais::all()); // Fue Creado
        $pais = Pais::first();
        $this->assertEquals($pais->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/paises/'.$pais->slug); // Funciona la redirección
    }

    public function test_paises_item_can_be_shown()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        $pais = Pais::factory()->create();
        $response = $this->get('/paises/'.$pais->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('paises.show'); // Se está mostrando la vista correcta
        $pais = Pais::first();
        $response->assertViewHas('pais', $pais); // Tiene el elemento creado
    }

    public function test_paises_can_be_updated()
    {
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::factory(2)->create();
        $continentes = Continente::factory(2)->create();
        $pais = Pais::factory()->create();
        $response = $this->put('/paises/'.$pais->slug, [
            'nombre' => 'nombre de prueba',
            'continente_id' => $continentes->random()->continente_id,
            'divisiones_politicas_tipo_id' => $divisiones_politicas_tipo->random()->divisiones_politicas_tipo_id,
        ]);
        $this->assertCount(1, Pais::all()); // Fue Creado
        $pais = $pais->fresh();
        $this->assertEquals($pais->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/paises/'.$pais->slug); // Funciona la redirección
    }

    public function test_paises_can_be_deleted()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        $pais = Pais::factory()->create();
        $response = $this->delete('/paises/'.$pais->slug);
        $this->assertCount(0, Pais::all()); // Fue Eliminado
        $response->assertRedirect('/paises'); // Funciona la redirección
    }

    public function test_paises_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(3)->create();
        $response = $this->get('/paises');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('paises.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('paises', function ($paises) {
            return $paises->contains(Pais::first());
        }); // Tiene los elementos creados
    }

    public function test_paises_nombre_is_required()
    {
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::factory(2)->create();
        $continentes = Continente::factory(2)->create();
        $response = $this->post('/paises', [
            'nombre' => '',
            'continente_id' => $continentes->random()->continente_id,
            'divisiones_politicas_tipo_id' => $divisiones_politicas_tipo->random()->divisiones_politicas_tipo_id,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Pais::all()); // No fue Creado
    }
}
