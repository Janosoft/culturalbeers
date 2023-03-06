<?php

namespace Tests\Feature;

use App\Models\CervezasFermento;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CervezasFermentoTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco

    public function test_fermentos_can_be_created()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/cervezas_fermentos', [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, CervezasFermento::all()); // Fue Creado
        $cervezas_fermento = CervezasFermento::first();
        $this->assertEquals($cervezas_fermento->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_fermentos/'.$cervezas_fermento->slug); // Funciona la redirección
    }

    public function test_fermentos_item_can_be_shown()
    {
        $user = User::factory()->create();
        $cervezas_fermento = CervezasFermento::factory()->create();
        $response = $this->actingAs($user)->get('/cervezas_fermentos/'.$cervezas_fermento->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_fermentos.show'); // Se está mostrando la vista correcta
        $cervezas_fermento = CervezasFermento::first();
        $response->assertViewHas('cervezas_fermento', $cervezas_fermento); // Tiene el elemento creado
    }

    public function test_fermentos_can_be_updated()
    {
        $user = User::factory()->create();
        $cervezas_fermento = CervezasFermento::factory()->create();
        $response = $this->actingAs($user)->put('/cervezas_fermentos/'.$cervezas_fermento->slug, [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, CervezasFermento::all()); // Fue Creado
        $cervezas_fermento = $cervezas_fermento->fresh();
        $this->assertEquals($cervezas_fermento->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_fermentos/'.$cervezas_fermento->slug); // Funciona la redirección
    }

    public function test_fermentos_can_be_deleted()
    {
        $user = User::factory()->create();
        $cervezas_fermento = CervezasFermento::factory()->create();
        $response = $this->actingAs($user)->delete('/cervezas_fermentos/'.$cervezas_fermento->slug);
        $this->assertCount(0, CervezasFermento::all()); // Fue Eliminado

        $response->assertRedirect('/cervezas_fermentos'); // Funciona la redirección
    }

    public function test_fermentos_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        CervezasFermento::factory(3)->create();
        $response = $this->actingAs($user)->get('/cervezas_fermentos');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_fermentos.index'); // Se está mostrando la vista correcta
        $response->assertViewHas('cervezas_fermentos', function ($cervezas_fermentos) {
            return $cervezas_fermentos->contains(CervezasFermento::first());
        }); // Tiene los elementos creados
    }

    public function test_fermentos_nombre_is_required()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/cervezas_fermentos', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, CervezasFermento::all()); // No fue Creado
    }
}
