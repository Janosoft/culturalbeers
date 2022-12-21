<?php

namespace Tests\Feature;

use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\DivisionPolitica;
use App\Models\Localidad;
use App\Models\Pais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocalidadTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco
    
    public function test_localidades_can_be_created()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        $divisiones_politicas= DivisionPolitica::factory(2)->create();
        $response = $this->post('/localidades', [
            'nombre' => 'nombre de prueba',
            'division_politica_id' => $divisiones_politicas->random()->division_politica_id,
        ]);
        $this->assertCount(1, Localidad::all()); // Fue Creado
        $localidad = Localidad::first();
        $this->assertEquals($localidad->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/localidades/' . $localidad->slug); // Funciona la redirección
    }

    public function test_localidades_item_can_be_shown()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidad = Localidad::factory()->create();
        $response = $this->get('/localidades/' . $localidad->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('localidades.show'); // Se está mostrando la vista correcta
        $localidad = Localidad::first();
        $response->assertViewHas('localidad', $localidad); // Tiene el elemento creado
    }

    public function test_localidades_can_be_updated()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        $divisiones_politicas= DivisionPolitica::factory(2)->create();
        $localidad = Localidad::factory()->create();
        $response = $this->put('/localidades/' . $localidad->slug, [
            'nombre' => 'nombre de prueba',
            'division_politica_id' => $divisiones_politicas->random()->division_politica_id,
        ]);
        $this->assertCount(1, Localidad::all()); // Fue Creado
        $localidad = $localidad->fresh();
        $this->assertEquals($localidad->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/localidades/' . $localidad->slug); // Funciona la redirección
    }

    public function test_localidades_can_be_deleted()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidad = Localidad::factory()->create();
        $response = $this->delete('/localidades/' . $localidad->slug);
        $this->assertCount(0, Localidad::all()); // Fue Eliminado

        $response->assertRedirect('/localidades'); // Funciona la redirección
    }

    public function test_localidades_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(3)->create();
        $response = $this->get('/localidades');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('localidades.index'); // Se está mostrando la vista correcta
        $localidades = Localidad::orderBy('nombre')->paginate();
        $response->assertViewHas('localidades', $localidades); // Tiene los elementos creados
    }

    public function test_localidades_nombre_is_required()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        $divisiones_politicas= DivisionPolitica::factory(2)->create();
        $response = $this->post('/localidades', [
            'nombre' => '',
            'division_politica_id' => $divisiones_politicas->random()->division_politica_id,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Localidad::all()); // No fue Creado
    }
}
