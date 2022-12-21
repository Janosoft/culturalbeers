<?php

namespace Tests\Feature;

use App\Models\CervezasFermento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CervezasFermentoTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco
    
    public function test_fermentos_can_be_created()
    {
        $response = $this->post('/cervezas_fermentos', [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, CervezasFermento::all()); // Fue Creado
        $cervezas_fermento = CervezasFermento::first();
        $this->assertEquals($cervezas_fermento->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_fermentos/' . $cervezas_fermento->slug); // Funciona la redirección
    }

    public function test_fermentos_item_can_be_shown()
    {
        $cervezas_fermento = CervezasFermento::factory()->create();
        $response = $this->get('/cervezas_fermentos/' . $cervezas_fermento->slug);
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_fermentos.show'); // Se está mostrando la vista correcta
        $cervezas_fermento = CervezasFermento::first();
        $response->assertViewHas('cervezas_fermento', $cervezas_fermento); // Tiene el elemento creado
    }

    public function test_fermentos_can_be_updated()
    {
        $cervezas_fermento = CervezasFermento::factory()->create();
        $response = $this->put('/cervezas_fermentos/' . $cervezas_fermento->slug, [
            'nombre' => 'nombre de prueba',
        ]);
        $this->assertCount(1, CervezasFermento::all()); // Fue Creado
        $cervezas_fermento = $cervezas_fermento->fresh();
        $this->assertEquals($cervezas_fermento->nombre, 'Nombre De Prueba'); // El nombre es correcto y fue capitalizado
        $response->assertRedirect('/cervezas_fermentos/' . $cervezas_fermento->slug); // Funciona la redirección
    }

    public function test_fermentos_can_be_deleted()
    {
        $cervezas_fermento = CervezasFermento::factory()->create();
        $response = $this->delete('/cervezas_fermentos/' . $cervezas_fermento->slug);
        $this->assertCount(0, CervezasFermento::all()); // Fue Eliminado

        $response->assertRedirect('/cervezas_fermentos'); // Funciona la redirección
    }

    public function test_fermentos_index_can_be_shown()
    {
        $this->withoutExceptionHandling();

        CervezasFermento::factory(3)->create();
        $response = $this->get('/cervezas_fermentos');
        $response->assertOk(); // Funciona la vista
        $response->assertViewIs('cervezas_fermentos.index'); // Se está mostrando la vista correcta
        $cervezas_fermentos = CervezasFermento::orderBy('nombre')->paginate();
        $response->assertViewHas('cervezas_fermentos', $cervezas_fermentos); // Tiene los elementos creados
    }

    public function test_fermentos_nombre_is_required()
    {
        $response = $this->post('/cervezas_fermentos', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
        $this->assertCount(0, CervezasFermento::all()); // No fue Creado
    }
}
