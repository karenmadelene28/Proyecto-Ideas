<?php

/* Definir nombre de test
Parámetros: Nombre del test, y la función*/
test('sum', function () { 
   $result = 1 +2 ;  //Ejecución (Lo que se quiere probar)
 
   expect($result)->toBe(3); // Comprobación (que esto sea igual a )
                            //También se puede poner lo que NO se espera
});

test('Comprobar si una persona es mayor de edad', function(){
    $edad = 20;
    $esMayor = $edad >=18;
    expect($esMayor)->toBeTrue();

});

test('Comprobar la cantidad de productos', function(){
    $productos = ['pan', 'leche', 'azucar'];
    expect($productos)->toHaveCount(3);

});

function calcularDescuento($precio, $descuento){
    return $precio - ($precio * $descuento/100);
}

test('calcular correctamente un descuento', function(){
    $resultado = calcularDescuento(200, 10);
    expect($resultado)->toEqual(180);

});

test('calcular correctamente un descuento estudiante', function(){
    $resultado = calcularDescuento(200, 50);
    expect($resultado)->toEqual(100);

});

test('calcular correctamente un descuento profesor', function(){
    $resultado = calcularDescuento(200, 0);
    expect($resultado)->toEqual(200);

});

test('calcular diferentes descuentos', function($precio, $descuento, $esperado){
    $resultado = calcularDescuento($precio, $descuento);
    expect($resultado)->toEqual($esperado);
})->with([
    'descuento de 10%' => [200, 10, 180],
    'descuento de 50%' => [200, 50, 100],
    'sin descuento' => [200, 0, 200],
]);
