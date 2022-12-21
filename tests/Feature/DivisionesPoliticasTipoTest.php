<?php

namespace Tests\Feature;

use App\Models\DivisionesPoliticasTipo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DivisionesPoliticasTipoTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco
    
    public function test_divisiones_politicas_tipos_can_be_created()
    {
        $response = $this->post('/divisiones_politicas_tipos', [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, DivisionesPoliticasTipo::all()); // Fue Creado
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::first();
        $this->assertEquals($divisiones_politicas_tipo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/divisiones_politicas_tipos/' . $divisiones_politicas_tipo->slug); // Funciona la redirección
    }

    public function test_divisiones_politicas_tipos_item_can_be_shown()
    {
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::factory()->create();
        $response = $this->get('/divisiones_politicas_tipos/' . $divisiones_politicas_tipo->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('divisiones_politicas_tipos.show'); // Se está mostrando la vista correcta
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::first();
        $response->assertViewHas('divisiones_politicas_tipo', $divisiones_politicas_tipo); // Tiene el elemento creado
    }

    public function test_divisiones_politicas_tipos_can_be_updated()
    {
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::factory()->create();
        $response = $this->put('/divisiones_politicas_tipos/' . $divisiones_politicas_tipo->slug, [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, DivisionesPoliticasTipo::all()); // Fue Creado
        $divisiones_politicas_tipo = $divisiones_politicas_tipo->fresh();
        $this->assertEquals($divisiones_politicas_tipo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/divisiones_politicas_tipos/' . $divisiones_politicas_tipo->slug); // Funciona la redirección
    }

    public function test_divisiones_politicas_tipos_can_be_deleted()
    {
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::factory()->create();
        $response = $this->delete('/divisiones_politicas_tipos/' . $divisiones_politicas_tipo->slug);
        $this->assertCount(0, DivisionesPoliticasTipo::all()); // Fue Eliminado

        $response->assertRedirect('/divisiones_politicas_tipos'); // Funciona la redirección
    }

    public function test_divisiones_politicas_tipos_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        DivisionesPoliticasTipo::factory(3)->create();
        $response = $this->get('/divisiones_politicas_tipos');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('divisiones_politicas_tipos.index'); // Se está mostrando la vista correcta
        $divisiones_politicas_tipos = DivisionesPoliticasTipo::orderBy('nombre')->paginate();
        $response->assertViewHas('divisiones_politicas_tipos', $divisiones_politicas_tipos); // Tiene los elementos creados
    }

    public function test_divisiones_politicas_tipos_nombre_is_required()
    {
        $response = $this->post('/divisiones_politicas_tipos', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, DivisionesPoliticasTipo::all()); // No fue Creado
    }
}
