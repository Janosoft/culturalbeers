<?php

namespace Tests\Feature;

use App\Models\CervezasColor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CervezasColorTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_colores_can_be_created()
    {
        $response = $this->post('/cervezas_colores', [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, CervezasColor::all()); // Fue Creado
        $cervezas_color = CervezasColor::first();
        $this->assertEquals($cervezas_color->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_colores/'.$cervezas_color->slug); // Funciona la redirección
    }

    public function test_colores_item_can_be_shown()
    {
        $cervezas_color = CervezasColor::factory()->create();
        $response = $this->get('/cervezas_colores/'.$cervezas_color->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_colores.show'); // Se está mostrando la vista correcta
        $cervezas_color = CervezasColor::first();
        $response->assertViewHas('cervezas_color', $cervezas_color); // Tiene el elemento creado
    }

    public function test_colores_can_be_updated()
    {
        $cervezas_color = CervezasColor::factory()->create();
        $response = $this->put('/cervezas_colores/'.$cervezas_color->slug, [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, CervezasColor::all()); // Fue Creado
        $cervezas_color = $cervezas_color->fresh();
        $this->assertEquals($cervezas_color->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_colores/'.$cervezas_color->slug); // Funciona la redirección
    }

    public function test_colores_can_be_deleted()
    {
        $cervezas_color = CervezasColor::factory()->create();
        $response = $this->delete('/cervezas_colores/'.$cervezas_color->slug);
        $this->assertCount(0, CervezasColor::all()); // Fue Eliminado

        $response->assertRedirect('/cervezas_colores'); // Funciona la redirección
    }

    public function test_colores_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        CervezasColor::factory(3)->create();
        $response = $this->get('/cervezas_colores');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_colores.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('cervezas_colores', function ($cervezas_colores) {
            return $cervezas_colores->contains(CervezasColor::first());
        }); // Tiene los elementos creados
    }

    public function test_colores_nombre_is_required()
    {
        $response = $this->post('/cervezas_colores', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, CervezasColor::all()); // No fue Creado
    }
}
