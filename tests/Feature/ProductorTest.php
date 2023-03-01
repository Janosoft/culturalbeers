<?php

namespace Tests\Feature;

use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\DivisionPolitica;
use App\Models\Localidad;
use App\Models\Pais;
use App\Models\Productor;
use App\Models\ProductoresFabricacion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductorTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_productores_can_be_created()
    {
        $user= User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades = Localidad::factory(2)->create();
        $productores_fabricaciones = ProductoresFabricacion::factory(2)->create();
        $response = $this->actingAs($user)->post('/productores', [
            'nombre' => 'nombre de prueba',
            'fabricacion_id' => $productores_fabricaciones->random()->fabricacion_id,
            'localidad' => $localidades->random()->nombre,
        ]);
        $this->assertCount(1, Productor::all()); // Fue Creado
        $productor = Productor::first();
        $this->assertEquals($productor->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/productores/'.$productor->slug); // Funciona la redirección
    }

    public function test_productores_item_can_be_shown()
    {
        $user= User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        $productor = Productor::factory()->create();
        $response = $this->actingAs($user)->get('/productores/'.$productor->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('productores.show'); // Se está mostrando la vista correcta
        $productor = Productor::first();
        $response->assertViewHas('productor', $productor); // Tiene el elemento creado
    }

    public function test_productores_can_be_updated()
    {
        $user= User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades = Localidad::factory(2)->create();
        $productores_fabricaciones = ProductoresFabricacion::factory(2)->create();
        $productor = Productor::factory()->create();
        $response = $this->actingAs($user)->put('/productores/'.$productor->slug, [
            'nombre' => 'nombre de prueba',
            'fabricacion_id' => $productores_fabricaciones->random()->fabricacion_id,
            'localidad' => $localidades->random()->nombre,
        ]);
        $this->assertCount(1, Productor::all()); // Fue Creado
        $productor = $productor->fresh();
        $this->assertEquals($productor->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/productores/'.$productor->slug); // Funciona la redirección
    }

    public function test_productores_can_be_deleted()
    {
        $user= User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        $productor = Productor::factory()->create();
        $response = $this->actingAs($user)->delete('/productores/'.$productor->slug);
        $this->assertCount(0, Productor::all()); // Fue Eliminado
        $response->assertRedirect('/productores'); // Funciona la redirección
    }

    public function test_productores_index_can_be_shown()
    {
        $this->withoutExceptionHandling();
        
        $user= User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        Productor::factory(3)->create();
        $response = $this->actingAs($user)->get('/productores');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('productores.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('productores', function ($productores) {
            return $productores->contains(Productor::first());
        }); // Tiene los elementos creados
    }

    public function test_productores_nombre_is_required()
    {
        $user= User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidades = Localidad::factory(2)->create();
        $productores_fabricaciones = ProductoresFabricacion::factory(2)->create();
        $response = $this->actingAs($user)->post('/productores', [
            'nombre' => '',
            'fabricacion_id' => $productores_fabricaciones->random()->fabricacion_id,
            'localidad' => $localidades->random()->nombre,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Productor::all()); // No fue Creado
    }
}
