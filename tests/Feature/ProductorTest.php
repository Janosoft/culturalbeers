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
use App\Models\Productor;
use App\Models\ProductoresFabricacion;

class ProductorTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco
    
    public function test_productores_can_be_created()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades= Localidad::factory(2)->create();
        $productores_fabricaciones= ProductoresFabricacion::factory(2)->create();
        $response = $this->post('/productores', [
            'nombre' => 'nombre de prueba',
            'fabricacion_id' => $productores_fabricaciones->random()->fabricacion_id,
            'localidad_id' => $localidades->random()->localidad_id,
        ]);
        $this->assertCount(1, Productor::all()); // Fue Creado
        $productor = Productor::first();
        $this->assertEquals($productor->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/productores/' . $productor->slug); // Funciona la redirección
    }

    public function test_productores_item_can_be_shown()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        $productor = Productor::factory()->create();
        $response = $this->get('/productores/' . $productor->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('productores.show'); // Se está mostrando la vista correcta
        $productor = Productor::first();
        $response->assertViewHas('productor', $productor); // Tiene el elemento creado
    }

    public function test_productores_can_be_updated()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades= Localidad::factory(2)->create();
        $productores_fabricaciones= ProductoresFabricacion::factory(2)->create();
        $productor = Productor::factory()->create();
        $response = $this->put('/productores/' . $productor->slug, [
            'nombre' => 'nombre de prueba',
            'fabricacion_id' => $productores_fabricaciones->random()->fabricacion_id,
            'localidad_id' => $localidades->random()->localidad_id,
        ]);
        $this->assertCount(1, Productor::all()); // Fue Creado
        $productor = $productor->fresh();
        $this->assertEquals($productor->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/productores/' . $productor->slug); // Funciona la redirección
    }

    public function test_productores_can_be_deleted()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        $productor = Productor::factory()->create();
        $response = $this->delete('/productores/' . $productor->slug);
        $this->assertCount(0, Productor::all()); // Fue Creado
        $response->assertRedirect('/productores'); // Funciona la redirección
    }

    public function test_productores_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        Productor::factory(3)->create();
        $response = $this->get('/productores');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('productores.index'); // Se está mostrando la vista correcta
        $productores = Productor::orderBy('nombre')->paginate();
        $response->assertViewHas('productores', $productores); // Tiene los elementos creados
    }

    public function test_productores_nombre_is_required()
    {
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades= Localidad::factory(2)->create();
        $productores_fabricaciones= ProductoresFabricacion::factory(2)->create();
        $response = $this->post('/productores', [
            'nombre' => '',
            'fabricacion_id' => $productores_fabricaciones->random()->fabricacion_id,
            'localidad_id' => $localidades->random()->localidad_id,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Productor::all()); // No fue Creado
    }
}
