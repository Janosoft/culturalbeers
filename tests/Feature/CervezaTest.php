<?php

namespace Tests\Feature;

use App\Models\Cerveza;
use App\Models\CervezasColor;
use App\Models\CervezasEnvaseTipo;
use App\Models\CervezasEstilo;
use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;
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

class CervezaTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_cervezas_can_be_created()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        CervezasEnvaseTipo::factory(2)->create();
        $productores = Productor::factory(2)->create();
        $colores = CervezasColor::factory(2)->create();
        $estilos = CervezasEstilo::factory(2)->create();
        $response = $this->actingAs($user)->post('/cervezas', [
            'nombre' => 'nombre de prueba',
            'IBU' => '10',
            'ABV' => '20',
            'productor_id' => $productores->random()->productor_id,
            'color_id' => $colores->random()->color_id,
            'estilo_id' => $estilos->random()->estilo_id,
            'envases' => [CervezasEnvaseTipo::all()->random()->envase_id],
        ]);
        $this->assertCount(1, Cerveza::all()); // Fue Creado
        $cerveza = Cerveza::first();
        $this->assertEquals($cerveza->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas/'.$cerveza->slug); // Funciona la redirección
    }

    public function test_cervezas_item_can_be_shown()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        CervezasEnvaseTipo::factory(2)->create();
        Productor::factory(2)->create();
        CervezasColor::factory(2)->create();
        CervezasEstilo::factory(2)->create();
        $cerveza = Cerveza::factory()->create();
        $response = $this->actingAs($user)->get('/cervezas/'.$cerveza->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas.show'); // Se está mostrando la vista correcta
        $cerveza = Cerveza::first();
        $response->assertViewHas('cerveza', $cerveza); // Tiene el elemento creado
    }

    public function test_cervezas_can_be_updated()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        CervezasEnvaseTipo::factory(2)->create();
        $productores = Productor::factory(2)->create();
        $colores = CervezasColor::factory(2)->create();
        $estilos = CervezasEstilo::factory(2)->create();
        $cerveza = Cerveza::factory()->create();
        $response = $this->actingAs($user)->put('/cervezas/'.$cerveza->slug, [
            'nombre' => 'nombre de prueba',
            'IBU' => '10',
            'ABV' => '20',
            'productor_id' => $productores->random()->productor_id,
            'color_id' => $colores->random()->color_id,
            'estilo_id' => $estilos->random()->estilo_id,
            'envases' => [CervezasEnvaseTipo::all()->random()->envase_id],
        ]);
        $this->assertCount(1, Cerveza::all()); // Fue Creado
        $cerveza = $cerveza->fresh();
        $this->assertEquals($cerveza->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas/'.$cerveza->slug); // Funciona la redirección
    }

    public function test_cervezas_can_be_deleted()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        CervezasEnvaseTipo::factory(2)->create();
        Productor::factory(2)->create();
        CervezasColor::factory(2)->create();
        CervezasEstilo::factory(2)->create();
        $cerveza = Cerveza::factory()->create();
        $response = $this->actingAs($user)->delete('/cervezas/'.$cerveza->slug);
        $this->assertCount(0, Cerveza::all()); // Fue Eliminado

        $response->assertRedirect('/cervezas'); // Funciona la redirección
    }

    public function test_cervezas_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        CervezasEnvaseTipo::factory(2)->create();
        Productor::factory(2)->create();
        CervezasColor::factory(2)->create();
        CervezasEstilo::factory(2)->create();
        Cerveza::factory(3)->create();
        $response = $this->actingAs($user)->get('/cervezas');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('cervezas', function ($cervezas) {
            return $cervezas->contains(Cerveza::first());
        });
    }

    public function test_cervezas_nombre_is_required()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        CervezasEnvaseTipo::factory(2)->create();
        $productores = Productor::factory(2)->create();
        $colores = CervezasColor::factory(2)->create();
        $estilos = CervezasEstilo::factory(2)->create();
        $response = $this->actingAs($user)->post('/cervezas', [
            'nombre' => '',
            'productor_id' => $productores->random()->productor_id,
            'color_id' => $colores->random()->color_id,
            'estilo_id' => $estilos->random()->estilo_id,
            'envases' => [CervezasEnvaseTipo::all()->random()->envase_id],
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, Cerveza::all()); // No fue Creado
    }

    public function test_cervezas_can_be_tasted()
    {
        $user = User::factory()->create();
        DivisionesPoliticasTipo::factory(2)->create();
        Continente::factory(2)->create();
        Pais::factory(2)->create();
        DivisionPolitica::factory(2)->create();
        Localidad::factory(2)->create();
        ProductoresFabricacion::factory(2)->create();
        CervezasFermento::factory(2)->create();
        CervezasFamilia::factory(2)->create();
        CervezasEnvaseTipo::factory(2)->create();
        Productor::factory(2)->create();
        CervezasColor::factory(2)->create();
        CervezasEstilo::factory(2)->create();
        $cerveza = Cerveza::factory()->create();
        $this->actingAs($user)->get('/taste/cervezas/'.$cerveza->slug);
        $this->assertCount(1, Cerveza::all()); // Fue Creado
        $cerveza = $cerveza->fresh();
        $this->assertTrue($cerveza->probada()); // Fue probada
        $this->actingAs($user)->get('/untaste/cervezas/'.$cerveza->slug);
        $this->assertFalse($cerveza->probada()); // Fue desprobada
    }
}
