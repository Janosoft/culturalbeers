<?php

namespace Tests\Feature;

use App\Models\CervezasEstilo;
use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CervezasEstiloTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_estilos_can_be_created()
    {
        $user= User::factory()->create();
        CervezasFermento::factory(2)->create();
        $cervezas_familias = CervezasFamilia::factory(2)->create();
        $response = $this->actingAs($user)->post('/cervezas_estilos', [
            'nombre' => 'nombre de prueba',
            'familia_id' => $cervezas_familias->random()->familia_id,
        ]);
        $this->assertCount(1, CervezasEstilo::all()); // Fue Creado
        $cervezas_estilo = CervezasEstilo::first();
        $this->assertEquals($cervezas_estilo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_estilos/'.$cervezas_estilo->slug); // Funciona la redirección
    }

    public function test_estilos_item_can_be_shown()
    {
        $user= User::factory()->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        $cervezas_estilo = CervezasEstilo::factory()->create();
        $response = $this->actingAs($user)->get('/cervezas_estilos/'.$cervezas_estilo->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_estilos.show'); // Se está mostrando la vista correcta
        $cervezas_estilo = CervezasEstilo::first();
        $response->assertViewHas('cervezas_estilo', $cervezas_estilo); // Tiene el elemento creado
    }

    public function test_estilos_can_be_updated()
    {
        $user= User::factory()->create();
        CervezasFermento::factory(2)->create();
        $cervezas_familias = CervezasFamilia::factory(2)->create();
        $cervezas_estilo = CervezasEstilo::factory()->create();
        $response = $this->actingAs($user)->put('/cervezas_estilos/'.$cervezas_estilo->slug, [
            'nombre' => 'nombre de prueba',
            'familia_id' => $cervezas_familias->random()->familia_id,
        ]);
        $this->assertCount(1, CervezasEstilo::all()); // Fue Creado
        $cervezas_estilo = $cervezas_estilo->fresh();
        $this->assertEquals($cervezas_estilo->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_estilos/'.$cervezas_estilo->slug); // Funciona la redirección
    }

    public function test_estilos_can_be_deleted()
    {
        $user= User::factory()->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        $cervezas_estilo = CervezasEstilo::factory()->create();
        $response = $this->actingAs($user)->delete('/cervezas_estilos/'.$cervezas_estilo->slug);
        $this->assertCount(0, CervezasEstilo::all()); // Fue Eliminado

        $response->assertRedirect('/cervezas_estilos'); // Funciona la redirección
    }

    public function test_estilos_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user= User::factory()->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        CervezasEstilo::factory(3)->create();
        $response = $this->actingAs($user)->get('/cervezas_estilos');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_estilos.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('cervezas_estilos', function ($cervezas_estilos) {
            return $cervezas_estilos->contains(CervezasEstilo::first());
        }); // Tiene los elementos creados
    }

    public function test_estilos_nombre_is_required()
    {
        $user= User::factory()->create();
        $response = $this->actingAs($user)->post('/cervezas_estilos', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, CervezasEstilo::all()); // No fue Creado
    }
}
