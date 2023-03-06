<?php

namespace Tests\Feature;

use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\DivisionPolitica;
use App\Models\Localidad;
use App\Models\Pais;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocalidadTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_localidades_can_be_created()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        $divisiones_politicas = DivisionPolitica::factory(2)->create();
        $response = $this->actingAs($user)->post('/localidades', [
            'nombre' => 'nombre de prueba',
            'division_politica_id' => $divisiones_politicas->random()->division_politica_id,
        ]);
        $this->assertCount(1, Localidad::all()); // Fue Creado
        $localidad = Localidad::first();
        $this->assertEquals($localidad->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/localidades/'.$localidad->slug); // Funciona la redirección
    }

    public function test_localidades_item_can_be_shown()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidad = Localidad::factory()->create();
        $response = $this->actingAs($user)->get('/localidades/'.$localidad->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('localidades.show'); // Se está mostrando la vista correcta
        $localidad = Localidad::first();
        $response->assertViewHas('localidad', $localidad); // Tiene el elemento creado
    }

    public function test_localidades_can_be_updated()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        $divisiones_politicas = DivisionPolitica::factory(2)->create();
        $localidad = Localidad::factory()->create();
        $response = $this->actingAs($user)->put('/localidades/'.$localidad->slug, [
            'nombre' => 'nombre de prueba',
            'division_politica_id' => $divisiones_politicas->random()->division_politica_id,
        ]);
        $this->assertCount(1, Localidad::all()); // Fue Creado
        $localidad = $localidad->fresh();
        $this->assertEquals($localidad->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/localidades/'.$localidad->slug); // Funciona la redirección
    }

    public function test_localidades_can_be_deleted()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        $localidad = Localidad::factory()->create();
        $response = $this->actingAs($user)->delete('/localidades/'.$localidad->slug);
        $this->assertCount(0, Localidad::all()); // Fue Eliminado

        $response->assertRedirect('/localidades'); // Funciona la redirección
    }

    public function test_localidades_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(3)->create();
        $response = $this->actingAs($user)->get('/localidades');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('localidades.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('localidades', function ($localidades) {
            return $localidades->contains(Localidad::first());
        }); // Tiene los elementos creados
    }

    public function test_localidades_nombre_is_required()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        $divisiones_politicas = DivisionPolitica::factory(2)->create();
        $response = $this->actingAs($user)->post('/localidades', [
            'nombre' => '',
            'division_politica_id' => $divisiones_politicas->random()->division_politica_id,
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Localidad::all()); // No fue Creado
    }
}
