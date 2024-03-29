<?php

namespace Tests\Feature;

use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\DivisionPolitica;
use App\Models\Pais;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DivisionPoliticaTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_divisiones_politicas_can_be_created()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        $paises = Pais::factory(2)->create();
        $response = $this->actingAs($user)->post('/divisiones_politicas', [
            'nombre' => 'nombre de prueba',
            'pais_id' => $paises->random()->pais_id,
        ]);
        $this->assertCount(1, DivisionPolitica::all()); // Fue Creado
        $division_politica = DivisionPolitica::first();
        $this->assertEquals($division_politica->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/divisiones_politicas/'.$division_politica->slug); // Funciona la redirección
    }

    public function test_divisiones_politicas_item_can_be_shown()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        $division_politica = DivisionPolitica::factory()->create();
        $response = $this->actingAs($user)->get('/divisiones_politicas/'.$division_politica->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('divisiones_politicas.show'); // Se está mostrando la vista correcta
        $division_politica = DivisionPolitica::first();
        $response->assertViewHas('division_politica', $division_politica); // Tiene el elemento creado
    }

    public function test_divisiones_politicas_can_be_updated()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        $paises = Pais::factory(2)->create();
        $division_politica = DivisionPolitica::factory()->create();
        $response = $this->actingAs($user)->put('/divisiones_politicas/'.$division_politica->slug, [
            'nombre' => 'nombre de prueba',
            'pais_id' => $paises->random()->pais_id,
        ]);
        $this->assertCount(1, DivisionPolitica::all()); // Fue Creado
        $division_politica = $division_politica->fresh();
        $this->assertEquals($division_politica->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/divisiones_politicas/'.$division_politica->slug); // Funciona la redirección
    }

    public function test_divisiones_politicas_can_be_deleted()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        $division_politica = DivisionPolitica::factory()->create();
        $response = $this->actingAs($user)->delete('/divisiones_politicas/'.$division_politica->slug);
        $this->assertCount(0, DivisionPolitica::all()); // Fue Eliminado

        $response->assertRedirect('/divisiones_politicas'); // Funciona la redirección
    }

    public function test_divisiones_politicas_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(3)->create();
        $response = $this->actingAs($user)->get('/divisiones_politicas');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('divisiones_politicas.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('divisiones_politicas', function ($divisiones_politicas) {
            return $divisiones_politicas->contains(DivisionPolitica::first());
        }); // Tiene los elementos creados
    }

    public function test_divisiones_politicas_nombre_is_required()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        $paises = Pais::factory(2)->create();
        $response = $this->actingAs($user)->post('/divisiones_politicas', [
            'nombre' => '',
            'pais_id' => $paises->random()->pais_id,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, DivisionPolitica::all()); // No fue Creado
    }
}
