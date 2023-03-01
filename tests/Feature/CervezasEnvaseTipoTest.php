<?php

namespace Tests\Feature;

use App\Models\CervezasEnvaseTipo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CervezasEnvaseTipoTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_envases_tipos_can_be_created()
    {
        $user= User::factory()->create();
        $response = $this->actingAs($user)->post('/cervezas_envases_tipos', [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, CervezasEnvaseTipo::all()); // Fue Creado
        $cervezas_envases_tipo = CervezasEnvaseTipo::first();
        $this->assertEquals($cervezas_envases_tipo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_envases_tipos/'.$cervezas_envases_tipo->slug); // Funciona la redirección
    }

    public function test_envases_tipos_item_can_be_shown()
    {
        $user= User::factory()->create();
        $cervezas_envases_tipo = CervezasEnvaseTipo::factory()->create();
        $response = $this->actingAs($user)->get('/cervezas_envases_tipos/'.$cervezas_envases_tipo->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_envases_tipos.show'); // Se está mostrando la vista correcta
        $cervezas_envases_tipo = CervezasEnvaseTipo::first();
        $response->assertViewHas('cervezas_envases_tipo', $cervezas_envases_tipo); // Tiene el elemento creado
    }

    public function test_envases_tipos_can_be_updated()
    {
        $user= User::factory()->create();
        $cervezas_envases_tipo = CervezasEnvaseTipo::factory()->create();
        $response = $this->actingAs($user)->put('/cervezas_envases_tipos/'.$cervezas_envases_tipo->slug, [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, CervezasEnvaseTipo::all()); // Fue Creado
        $cervezas_envases_tipo = $cervezas_envases_tipo->fresh();
        $this->assertEquals($cervezas_envases_tipo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_envases_tipos/'.$cervezas_envases_tipo->slug); // Funciona la redirección
    }

    public function test_envases_tipos_can_be_deleted()
    {
        $user= User::factory()->create();
        $cervezas_envases_tipo = CervezasEnvaseTipo::factory()->create();
        $response = $this->actingAs($user)->delete('/cervezas_envases_tipos/'.$cervezas_envases_tipo->slug);
        $this->assertCount(0, CervezasEnvaseTipo::all()); // Fue Eliminado

        $response->assertRedirect('/cervezas_envases_tipos'); // Funciona la redirección
    }

    public function test_envases_tipos_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user= User::factory()->create();
        CervezasEnvaseTipo::factory(3)->create();
        $response = $this->actingAs($user)->get('/cervezas_envases_tipos');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_envases_tipos.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('cervezas_envases_tipos', function ($cervezas_envases_tipos) {
            return $cervezas_envases_tipos->contains(CervezasEnvaseTipo::first());
        }); // Tiene los elementos creados
    }

    public function test_envases_tipos_nombre_is_required()
    {
        $user= User::factory()->create();
        $response = $this->actingAs($user)->post('/cervezas_envases_tipos', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, CervezasEnvaseTipo::all()); // No fue Creado
    }
}
