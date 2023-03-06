<?php

namespace Tests\Feature;

use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CervezasFamiliaTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_familias_can_be_created()
    {
        $user = User::factory()->create();
        $cervezas_fermentos = CervezasFermento::factory(2)->create();
        $response = $this->actingAs($user)->post('/cervezas_familias', [
            'nombre' => 'nombre de prueba',
            'fermento_id' => $cervezas_fermentos->random()->fermento_id,
        ]);
        $this->assertCount(1, CervezasFamilia::all()); // Fue Creado
        $cervezas_familia = CervezasFamilia::first();
        $this->assertEquals($cervezas_familia->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_familias/'.$cervezas_familia->slug); // Funciona la redirección
    }

    public function test_familias_item_can_be_shown()
    {
        $user = User::factory()->create();
        CervezasFermento::factory(2)->create();
        $cervezas_familia = CervezasFamilia::factory()->create();
        $response = $this->actingAs($user)->get('/cervezas_familias/'.$cervezas_familia->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_familias.show'); // Se está mostrando la vista correcta
        $cervezas_familia = CervezasFamilia::first();
        $response->assertViewHas('cervezas_familia', $cervezas_familia); // Tiene el elemento creado
    }

    public function test_familias_can_be_updated()
    {
        $user = User::factory()->create();
        $cervezas_fermentos = CervezasFermento::factory(2)->create();
        $cervezas_familia = CervezasFamilia::factory()->create();
        $response = $this->actingAs($user)->put('/cervezas_familias/'.$cervezas_familia->slug, [
            'nombre' => 'nombre de prueba',
            'fermento_id' => $cervezas_fermentos->random()->fermento_id,
        ]);
        $this->assertCount(1, CervezasFamilia::all()); // Fue Creado
        $cervezas_familia = $cervezas_familia->fresh();
        $this->assertEquals($cervezas_familia->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_familias/'.$cervezas_familia->slug); // Funciona la redirección
    }

    public function test_familias_can_be_deleted()
    {
        $user = User::factory()->create();
        CervezasFermento::factory(2)->create();
        $cervezas_familia = CervezasFamilia::factory()->create();
        $response = $this->actingAs($user)->delete('/cervezas_familias/'.$cervezas_familia->slug);
        $this->assertCount(0, CervezasFamilia::all()); // Fue Eliminado

        $response->assertRedirect('/cervezas_familias'); // Funciona la redirección
    }

    public function test_familias_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(3)->create();
        $response = $this->actingAs($user)->get('/cervezas_familias');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_familias.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('cervezas_familias', function ($cervezas_familias) {
            return $cervezas_familias->contains(CervezasFamilia::first());
        }); // Tiene los elementos creados
    }

    public function test_familias_nombre_is_required()
    {
        $user = User::factory()->create();
        $cervezas_fermentos = CervezasFermento::factory(2)->create();
        $response = $this->actingAs($user)->post('/cervezas_familias', [
            'nombre' => '',
            'fermento_id' => $cervezas_fermentos->random()->fermento_id,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, CervezasFamilia::all()); // No fue Creado
    }
}
