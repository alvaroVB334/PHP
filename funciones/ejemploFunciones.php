<?php



function suma2($num1, $num2) 
{

    $resultado = $num1 + $num2;
    print($resultado);
 
}


//A la hora de llamar a una funcion podemos pasar una variable por referencia
//poniendo el simbolo & antes de la variable
//Eso hace que el valor de la variable pasada como argumento pueda ser modificado
//Los parametros son las variables en la definicion de la funcion
function suma($num1, $num2, &$resultado)
{
    $num2 = $num2 + 5;

    $resultado = $num1 + $num2;
    print($resultado);
}

function maximo($num1, $num2, $num3=9)
{
    if ($num1 > $num2 && $num1 > $num3)
        return $num1;
    else if ($num2 > $num3)
        return $num2;
    else
        return $num3;
}

$num3 = 4;
$suma = 0;

//Los argumentos son las variables o valores que se usan cuando 
//llamamos a una funcion
suma(8, $num3, $suma);

print "\nNum3 vale $num3";

print "\n".maximo(3,6);

print "\n".maximo(6,num3:6,num2:4);

$nombreFuncion="maximo";
//Al igual que con las variables, podemos llamar a las funciones con doble referencia
//si tenemos su nombre en otra variable.
//print ${$nombreFuncion}(3,4,8);
?>


