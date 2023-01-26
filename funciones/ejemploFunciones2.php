<?php

include("ejemploFunciones.php");

$fraseT = "Esta es una frase muy tonta una";

function minimo(int $num1, int $num2): int
{
    return 5;
}

/**
 * Funcion que recibe una frase y una letra y devuelve la cantidad de veces
 * que dicha letra aparece en la frase
 * 
 * @param frase cadena de busqueda
 * @param letra letra a buscar
 */
function ocurrencias($frase, $letra)
{

    $frase = str_split($frase);

    //Array count values comprueba todos los elementos de un array
    //y  cuenta la cantidad de ellos
    //devuelve un array asociativo con los elementos encontrados y su cantidad
    $frase = array_count_values($frase);
    // var_dump($frase);
    if (isset($frase[$letra]))
        return $frase[$letra];
    else return 0;
}
$letra = '';
print "Hay " . ocurrencias($fraseT, $letra) . " ocurrencias de $letra \n";

//La funcion substr nos corta la cadena original a partir de una posicion, indicandole la longitud
print substr($fraseT,8,3);

print "Encontrada en la posicion ".strpos($fraseT,"una");

print "Encontrada en la posicion ".strrpos($fraseT,"una");

$cantidad=0;
$reemplazada=str_replace("una","uno",$fraseT,$cantidad);

print "\nFrase Original:";var_dump($fraseT);
print "\nFrase Modificada:";var_dump($reemplazada);

print "\nElementos reemplazados $cantidad";


