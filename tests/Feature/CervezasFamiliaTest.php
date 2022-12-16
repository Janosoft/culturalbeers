<?php

namespace Tests\Feature;

use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CervezasFamiliaTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco
    
    public function test_familias_can_be_created()
    {
        $cervezas_fermentos= CervezasFermento::factory(2)->create();
        $response = $this->post('/cervezas_familias', [
            'nombre' => 'nombre de prueba',
            'fermento_id' => $cervezas_fermentos->random()->fermento_id,
        ]);
        $this->assertCount(1, CervezasFamilia::all()); // Fue Creado
        $cervezas_familia = CervezasFamilia::first();
        $this->assertEquals($cervezas_familia->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_familias/' . $cervezas_familia->slug); // Funciona la redirección
    }

    public function test_familias_item_can_be_shown()
    {
        CervezasFermento::factory(2)->create();
        $cervezas_familia = CervezasFamilia::factory()->create();
        $response = $this->get('/cervezas_familias/' . $cervezas_familia->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_familias.show'); // Se está mostrando la vista correcta
        $cervezas_familia = CervezasFamilia::first();
        $response->assertViewHas('cervezas_familia', $cervezas_familia); // Tiene el elemento creado
    }

    public function test_familias_can_be_updated()
    {
        $cervezas_fermentos= CervezasFermento::factory(2)->create();
        $cervezas_familia = CervezasFamilia::factory()->create();
        $response = $this->put('/cervezas_familias/' . $cervezas_familia->slug, [
            'nombre' => 'nombre de prueba',
            'fermento_id' => $cervezas_fermentos->random()->fermento_id,
        ]);
        $this->assertCount(1, CervezasFamilia::all()); // Fue Creado
        $cervezas_familia = $cervezas_familia->fresh();
        $this->assertEquals($cervezas_familia->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_familias/' . $cervezas_familia->slug); // Funciona la redirección
    }

    public function test_familias_can_be_deleted()
    {
        CervezasFermento::factory(2)->create();
        $cervezas_familia = CervezasFamilia::factory()->create();
        $response = $this->delete('/cervezas_familias/' . $cervezas_familia->slug);
        $this->assertCount(0, CervezasFamilia::all()); // Fue Creado

        $response->assertRedirect('/cervezas_familias'); // Funciona la redirección
    }

    public function test_familias_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(3)->create();
        $response = $this->get('/cervezas_familias');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_familias.index'); // Se está mostrando la vista correcta
        $cervezas_familias = CervezasFamilia::orderBy('nombre')->paginate();
        $response->assertViewHas('cervezas_familias', $cervezas_familias); // Tiene los elementos creados
    }

    public function test_familias_nombre_is_required()
    {
        $cervezas_fermentos= CervezasFermento::factory(2)->create();
        $response = $this->post('/cervezas_familias', [
            'nombre' => '',
            'fermento_id' => $cervezas_fermentos->random()->fermento_id,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, CervezasFamilia::all()); // No fue Creado
    }
}
