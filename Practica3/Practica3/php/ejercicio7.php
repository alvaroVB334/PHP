<?php
/**
 * Función que convierte una palabra en minuscula en números y los suma para dar el "valor" de esa palabra
 * sin uso de funciones externas
 * @param $palabra -> Palabra a evaular
 */
function convertir_strnum($palabra)
{

    $abecedario = "abcdefghijklmnopqrstuvwxyz"; //La ñ no la reconoce 
    $array_conversor = [];
    $suma = 0;

    for ($i = 0; $i < strlen($abecedario); $i++) { //Creo el array asociativo 'letra'=>'numero'
        $array_conversor[$abecedario[$i]] = $i + 1;
    }
    for ($i = 0; $i < strlen($palabra); $i++) { //Voy sumando los valores recogidos del array asociativo cuando le voy pasando los elementos de la palabra

        $suma += $array_conversor[$palabra[$i]];
    }

    return $suma;
}
/**
 * Función que convierte una palabra en minuscula en números y los suma para dar el "valor" de esa palabra
 * con la función ord
 * @param $palabra -> Palabra a evaular
 */
function convertir_strnum_funciones($palabra)
{
    $suma = 0;

    for ($i = 0; $i < strlen($palabra); $i++) {
        $numero = ord($palabra[$i]) - 96;
        $suma += $numero;
    }
    return $suma;
}

/**
 * Función que compara los valores de dos palabras e indica cual vale más
 */
function palabra_mayor($palabra1, $palabra2)
{
    $numero1 = convertir_strnum($palabra1);
    $numero2 = convertir_strnum_funciones($palabra2);

    if ($numero1 > $numero2) {
        return "La palabra que mas vale es <b>" . $palabra1 . "</b> con: " . $numero1;
    } else if ($numero2 > $numero1) {
        return "La palabra que mas vale es <b>" . $palabra2 . "</b> con: " . $numero2;
    } else return -1;
}


//-----------  Pruebas ---------------------

 if(palabra_mayor("hola","familia")==-1){
     echo "Son iguales";
 }else echo palabra_mayor("hola","familia");
