<?php

/**
 * Realizar un programa que lea una frase y cuente las palabras con mas de 5 caracteres
 */
//numero de palabras resultante
$numPalMayor5=0;
$frase ="En un lugare de la manchae de cuyo nombre no quiero acordarme";
$numCar=0;

for($i=0;$i<strlen($frase);$i++)
{

    if ($frase[$i] == ' ')
    {
        $numCar=0;
    }
    else
    {
        //Si no es un espacio incrementamos el tamaño de la palabra actual
        $numCar++;
        //Si llevamos 5 caracteres en la palabra actual incrementamos el numero
        //de palabras
        if ($numCar==5)
            $numPalMayor5++;
    }


}

/**
 * Funcion que recibe una cadena con palabras y nos devuelve
 * el número de palabras cuya longitude sea superior a la longitud 
 * que recibimos
 */
function masDe5($frase,$longitud)
{
    //Con explode separamos las palabras y las guardamos en un array
    $palabras=explode(" ",$frase);

        $num_palabras=0;
    foreach($palabras as $palabra)
    {
     if (strlen($palabra)>=$longitud) $num_palabras++;   
    }

    return $num_palabras;

}

print "El numero de palabras mayor de 5 es $numPalMayor5 \n";

print "El numero de palabras mayor de 4 es ".masDe5($frase,4)."\n";


$frase=str_split($frase);
var_dump($frase);
?>