<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ProductoresFabricacion;

class ProductoresFabricacionTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_productores_fabricaciones_can_be_created()
    {
        $response = $this->post('/productores_fabricaciones', [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, ProductoresFabricacion::all()); // Fue Creado
        $productores_fabricacion = ProductoresFabricacion::first();
        $this->assertEquals($productores_fabricacion->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/productores_fabricaciones/' . $productores_fabricacion->slug); // Funciona la redirección
    }

    public function test_productores_fabricaciones_item_can_be_shown()
    {
        $productores_fabricacion = ProductoresFabricacion::factory()->create();
        $response = $this->get('/productores_fabricaciones/' . $productores_fabricacion->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('productores_fabricaciones.show'); // Se está mostrando la vista correcta
        $productores_fabricacion = ProductoresFabricacion::first();
        $response->assertViewHas('productores_fabricacion', $productores_fabricacion); // Tiene el elemento creado
    }

    public function test_productores_fabricaciones_can_be_updated()
    {
        $productores_fabricacion = ProductoresFabricacion::factory()->create();
        $response = $this->put('/productores_fabricaciones/' . $productores_fabricacion->slug, [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, ProductoresFabricacion::all()); // Fue Creado
        $productores_fabricacion = $productores_fabricacion->fresh();
        $this->assertEquals($productores_fabricacion->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/productores_fabricaciones/' . $productores_fabricacion->slug); // Funciona la redirección
    }

    public function test_productores_fabricaciones_can_be_deleted()
    {
        $productores_fabricacion = ProductoresFabricacion::factory()->create();
        $response = $this->delete('/productores_fabricaciones/' . $productores_fabricacion->slug);
        $this->assertCount(0, ProductoresFabricacion::all()); // Fue Creado
        $response->assertRedirect('/productores_fabricaciones'); // Funciona la redirección
    }

    public function test_productores_fabricaciones_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        ProductoresFabricacion::factory(3)->create();
        $response = $this->get('/productores_fabricaciones');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('productores_fabricaciones.index'); // Se está mostrando la vista correcta
        $productores_fabricaciones = ProductoresFabricacion::orderBy('nombre')->paginate();
        $response->assertViewHas('productores_fabricaciones', $productores_fabricaciones); // Tiene los elementos creados
    }

    public function test_productores_fabricaciones_nombre_is_required()
    {
        $response = $this->post('/productores_fabricaciones', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, ProductoresFabricacion::all()); // No fue Creado
    }
}
