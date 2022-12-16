<?php

namespace Tests\Feature;

use App\Models\CervezasEstilo;
use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CervezasEstiloTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco
    
    public function test_estilos_can_be_created()
    {
        CervezasFermento::factory(2)->create();
        $cervezas_familias= CervezasFamilia::factory(2)->create();
        $response = $this->post('/cervezas_estilos', [
            'nombre' => 'nombre de prueba',
            'familia_id' => $cervezas_familias->random()->familia_id,
        ]);
        $this->assertCount(1, CervezasEstilo::all()); // Fue Creado
        $cervezas_estilo = CervezasEstilo::first();
        $this->assertEquals($cervezas_estilo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_estilos/' . $cervezas_estilo->slug); // Funciona la redirección
    }

    public function test_estilos_item_can_be_shown()
    {
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        $cervezas_estilo = CervezasEstilo::factory()->create();
        $response = $this->get('/cervezas_estilos/' . $cervezas_estilo->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_estilos.show'); // Se está mostrando la vista correcta
        $cervezas_estilo = CervezasEstilo::first();
        $response->assertViewHas('cervezas_estilo', $cervezas_estilo); // Tiene el elemento creado
    }

    public function test_estilos_can_be_updated()
    {
        CervezasFermento::factory(2)->create();
        $cervezas_familias= CervezasFamilia::factory(2)->create();
        $cervezas_estilo = CervezasEstilo::factory()->create();
        $response = $this->put('/cervezas_estilos/' . $cervezas_estilo->slug, [
            'nombre' => 'nombre de prueba',
            'familia_id' => $cervezas_familias->random()->familia_id,
        ]);
        $this->assertCount(1, CervezasEstilo::all()); // Fue Creado
        $cervezas_estilo = $cervezas_estilo->fresh();
        $this->assertEquals($cervezas_estilo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_estilos/' . $cervezas_estilo->slug); // Funciona la redirección
    }

    public function test_estilos_can_be_deleted()
    {
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        $cervezas_estilo = CervezasEstilo::factory()->create();
        $response = $this->delete('/cervezas_estilos/' . $cervezas_estilo->slug);
        $this->assertCount(0, CervezasEstilo::all()); // Fue Creado

        $response->assertRedirect('/cervezas_estilos'); // Funciona la redirección
    }

    public function test_estilos_index_can_be_shown()
    {
        $this->withoutExceptionHandling();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        CervezasEstilo::factory(3)->create();
        $response = $this->get('/cervezas_estilos');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_estilos.index'); // Se está mostrando la vista correcta
        $cervezas_estilos = CervezasEstilo::orderBy('nombre')->paginate();
        $response->assertViewHas('cervezas_estilos', $cervezas_estilos); // Tiene los elementos creados
    }

    public function test_estilos_nombre_is_required()
    {
        $response = $this->post('/cervezas_estilos', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, CervezasEstilo::all()); // No fue Creado
    }
}
