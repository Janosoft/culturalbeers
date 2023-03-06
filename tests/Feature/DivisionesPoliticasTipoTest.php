<?php

namespace Tests\Feature;

use App\Models\DivisionesPoliticasTipo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DivisionesPoliticasTipoTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_divisiones_politicas_tipos_can_be_created()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/divisiones_politicas_tipos', [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, DivisionesPoliticasTipo::all()); // Fue Creado
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::first();
        $this->assertEquals($divisiones_politicas_tipo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/divisiones_politicas_tipos/'.$divisiones_politicas_tipo->slug); // Funciona la redirección
    }

    public function test_divisiones_politicas_tipos_item_can_be_shown()
    {
        $user = User::factory()->create();
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::factory()->create();
        $response = $this->actingAs($user)->get('/divisiones_politicas_tipos/'.$divisiones_politicas_tipo->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('divisiones_politicas_tipos.show'); // Se está mostrando la vista correcta
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::first();
        $response->assertViewHas('divisiones_politicas_tipo', $divisiones_politicas_tipo); // Tiene el elemento creado
    }

    public function test_divisiones_politicas_tipos_can_be_updated()
    {
        $user = User::factory()->create();
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::factory()->create();
        $response = $this->actingAs($user)->put('/divisiones_politicas_tipos/'.$divisiones_politicas_tipo->slug, [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, DivisionesPoliticasTipo::all()); // Fue Creado
        $divisiones_politicas_tipo = $divisiones_politicas_tipo->fresh();
        $this->assertEquals($divisiones_politicas_tipo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/divisiones_politicas_tipos/'.$divisiones_politicas_tipo->slug); // Funciona la redirección
    }

    public function test_divisiones_politicas_tipos_can_be_deleted()
    {
        $user = User::factory()->create();
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::factory()->create();
        $response = $this->actingAs($user)->delete('/divisiones_politicas_tipos/'.$divisiones_politicas_tipo->slug);
        $this->assertCount(0, DivisionesPoliticasTipo::all()); // Fue Eliminado

        $response->assertRedirect('/divisiones_politicas_tipos'); // Funciona la redirección
    }

    public function test_divisiones_politicas_tipos_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(3)->create();
        $response = $this->actingAs($user)->get('/divisiones_politicas_tipos');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('divisiones_politicas_tipos.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('divisiones_politicas_tipos', function ($divisiones_politicas_tipos) {
            return $divisiones_politicas_tipos->contains(DivisionesPoliticasTipo::first());
        }); // Tiene los elementos creados
    }

    public function test_divisiones_politicas_tipos_nombre_is_required()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/divisiones_politicas_tipos', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, DivisionesPoliticasTipo::all()); // No fue Creado
    }
}
