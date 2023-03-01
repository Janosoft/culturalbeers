<?php

namespace Tests\Feature;

use App\Models\ProductoresFabricacion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductoresFabricacionTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_productores_fabricaciones_can_be_created()
    {
        $user= User::factory()->create();
        $response = $this->actingAs($user)->post('/productores_fabricaciones', [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, ProductoresFabricacion::all()); // Fue Creado
        $productores_fabricacion = ProductoresFabricacion::first();
        $this->assertEquals($productores_fabricacion->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/productores_fabricaciones/'.$productores_fabricacion->slug); // Funciona la redirección
    }

    public function test_productores_fabricaciones_item_can_be_shown()
    {
        $user= User::factory()->create();
        $productores_fabricacion = ProductoresFabricacion::factory()->create();
        $response = $this->actingAs($user)->get('/productores_fabricaciones/'.$productores_fabricacion->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('productores_fabricaciones.show'); // Se está mostrando la vista correcta
        $productores_fabricacion = ProductoresFabricacion::first();
        $response->assertViewHas('productores_fabricacion', $productores_fabricacion); // Tiene el elemento creado
    }

    public function test_productores_fabricaciones_can_be_updated()
    {
        $user= User::factory()->create();
        $productores_fabricacion = ProductoresFabricacion::factory()->create();
        $response = $this->actingAs($user)->put('/productores_fabricaciones/'.$productores_fabricacion->slug, [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, ProductoresFabricacion::all()); // Fue Creado
        $productores_fabricacion = $productores_fabricacion->fresh();
        $this->assertEquals($productores_fabricacion->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/productores_fabricaciones/'.$productores_fabricacion->slug); // Funciona la redirección
    }

    public function test_productores_fabricaciones_can_be_deleted()
    {
        $user= User::factory()->create();
        $productores_fabricacion = ProductoresFabricacion::factory()->create();
        $response = $this->actingAs($user)->delete('/productores_fabricaciones/'.$productores_fabricacion->slug);
        $this->assertCount(0, ProductoresFabricacion::all()); // Fue Eliminado
        $response->assertRedirect('/productores_fabricaciones'); // Funciona la redirección
    }

    public function test_productores_fabricaciones_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user= User::factory()->create();
        ProductoresFabricacion::factory(3)->create();
        $response = $this->actingAs($user)->get('/productores_fabricaciones');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('productores_fabricaciones.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('productores_fabricaciones', function ($productores_fabricaciones) {
            return $productores_fabricaciones->contains(ProductoresFabricacion::first());
        }); // Tiene los elementos creados
    }

    public function test_productores_fabricaciones_nombre_is_required()
    {
        $user= User::factory()->create();
        $response = $this->actingAs($user)->post('/productores_fabricaciones', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, ProductoresFabricacion::all()); // No fue Creado
    }
}
