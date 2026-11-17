<?php

use App\Models\Categoria;
use App\Models\Idea;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;

uses(RefreshDatabase::class);

test('utilizar base de datos de prueba', function () {
    expect(config('database.default'))->toBe('sqlite');
    expect(config('database.connections.sqlite.database'))->toBe(':memory:');
});

test('registrar una categoría', function () { //Comprobación de que se puede registrar una categoría en la base de datos
    Categoria::create([
        'nombre' => 'Ciencia',  //Los nombres de los campos deben coincidir con los de la base de datos
        'descripcion' => 'Ideas de ciencias',
        ]);
        
    // dd(Categoria::all());   //Para checar las acciones de registro y eliminado 

    $this->assertDatabaseHas('categorias', [
        'nombre' => 'Ciencia',
        'descripcion' => 'Ideas de ciencias',
    ]);
});

test('consultar una categoría', function () { //Comprobación de que se puede consultar una categoría en la base de datos
    $categoria = Categoria::create([
        'nombre' => 'Ciencia',
        'descripcion' => 'Ideas de ciencias',
        ]);

    $encontrada = Categoria::find($categoria->id);

    expect($encontrada->nombre)->toBe('Ciencia');
});

test('modificar una categoría', function () { //Comprobación de que se puede modificar una categoría en la base de datos
    $categoria = Categoria::create([
        'nombre' => 'Ciencia',
        'descripcion' => 'Ideas de ciencias',
        ]);

    $categoria->update([
        'nombre' => 'Innovación',
    ]);

    $this->assertDatabaseHas('categorias', [
        'id' => $categoria->id,
        'nombre' => 'Innovación',
    ]);

    $this->assertDatabaseMissing('categorias', [
        'id' => $categoria->id,
        'nombre' => 'Ciencia',
    ]);
});

test('eliminar una categoría', function () { //Comprobación de que se puede eliminar una categoría en la base de datos
    $categoria = Categoria::create([
        'nombre' => 'Ciencia',
        'descripcion' => 'Ideas de ciencias',
        ]);

    $categoria->delete();

    $this->assertDatabaseMissing('categorias', [
        'id' => $categoria->id,
    ]);
});

test('una categoría puede tener varias ideas', function () {
    $categoria = Categoria::create([
    'nombre' => 'Tecnología',
    'descripcion' => 'Ideas tecnológicas'
    ]);

    Idea::create([
    'titulo' => 'Aplicación de transporte',
    'descripcion' => 'Aplicación para compartir viajes',
    'autor' => 'Ana',
    'estado' => 'registrada',
    'categoria_id' => $categoria->id
    ]);

    Idea::create([
    'titulo' => 'Sistema de inventario',
    'descripcion' => 'Control de productos',
    'autor' => 'Luis',
    'estado' => 'registrada',
    'categoria_id' => $categoria->id
    ]);

    expect($categoria->ideas)->toHaveCount(2); //Importante que en el modelo de Categoria se tenga la relación ideas() definida
});

test('no se puede borrar una categoría con ideas asociadas', function () {
    $categoria = Categoria::create([
    'nombre' => 'Tecnología',
    'descripcion' => 'Ideas tecnológicas'
    ]);

    Idea::create([
    'titulo' => 'Aplicación de transporte',
    'descripcion' => 'Aplicación para compartir viajes',
    'autor' => 'Ana',
    'estado' => 'registrada',
    'categoria_id' => $categoria->id
    ]);

    Idea::create([
    'titulo' => 'Sistema de inventario',
    'descripcion' => 'Control de productos',
    'autor' => 'Luis',
    'estado' => 'registrada',
    'categoria_id' => $categoria->id
    ]);

    $seRechazo = false;

    try {
        $categoria->delete();
    } catch (QueryException $e) {
        //La base de datos lanza una excepción de integridad referencial al intentar eliminar la categoría con ideas asociadas
        $seRechazo= true;
    }

    expect($seRechazo)->toBeTrue();

    $this->assertDatabaseHas('categorias', [
        'id' => $categoria->id,
    ]);
});