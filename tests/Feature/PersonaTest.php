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
use App\Models\Persona;

class PersonaTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco
    
    public function test_personas_can_be_created()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades= Localidad::factory(2)->create();
        $response = $this->post('/personas', [
            'nombre' => 'nombre de prueba',
            'apellido' => 'apellido de prueba',
            'localidad_id' => $localidades->random()->localidad_id,
        ]);
        $this->assertCount(1, Persona::all()); // Fue Creado
        $persona = Persona::first();
        $this->assertEquals($persona->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $this->assertEquals($persona->apellido, 'Apellido De Prueba'); // El apellido es correcto y fue capitalizado
        $response->assertRedirect('/personas/' . $persona->slug); // Funciona la redirección
    }

    public function test_personas_item_can_be_shown()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        $persona = Persona::factory()->create();
        $response = $this->get('/personas/' . $persona->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('personas.show'); // Se está mostrando la vista correcta
        $persona = Persona::first();
        $response->assertViewHas('persona', $persona); // Tiene el elemento creado
    }

    public function test_personas_can_be_updated()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades= Localidad::factory(2)->create();
        $persona = Persona::factory()->create();
        $response = $this->put('/personas/' . $persona->slug, [
            'nombre' => 'nombre de prueba',
            'apellido' => 'apellido de prueba',
            'localidad_id' => $localidades->random()->localidad_id,
        ]);
        $this->assertCount(1, Persona::all()); // Fue Creado
        $persona = $persona->fresh();
        $this->assertEquals($persona->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $this->assertEquals($persona->apellido, 'Apellido De Prueba'); // El apellido es correcto y fue capitalizado
        $response->assertRedirect('/personas/' . $persona->slug); // Funciona la redirección
    }

    public function test_personas_can_be_deleted()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        $persona = Persona::factory()->create();
        $response = $this->delete('/personas/' . $persona->slug);
        $this->assertCount(0, Persona::all()); // Fue Creado
        $response->assertRedirect('/personas'); // Funciona la redirección
    }

    public function test_personas_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        Persona::factory(3)->create();
        $response = $this->get('/personas');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('personas.index'); // Se está mostrando la vista correcta
        $personas = Persona::orderBy('nombre')->paginate();
        $response->assertViewHas('personas', $personas); // Tiene los elementos creados
    }

    public function test_personas_nombre_is_required()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades= Localidad::factory(2)->create();
        $response = $this->post('/personas', [
            'nombre' => '',
            'apellido' => 'apellido de prueba',
            'localidad_id' => $localidades->random()->localidad_id,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Persona::all()); // No fue Creado
    }

    public function test_personas_apellido_is_required()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades= Localidad::factory(2)->create();
        $response = $this->post('/personas', [
            'nombre' => 'nombre de prueba',
            'apellido' => '',
            'localidad_id' => $localidades->random()->localidad_id,
        ]);
        $response->assertSessionHasErrors('apellido');
        $this->assertCount(0, Persona::all()); // No fue Creado
    }
}
