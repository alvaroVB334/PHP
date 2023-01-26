<?php

$nota = 235.34345;
$fraseT = " Esta es una frase    muy tonta una ";
//sprintf es igual que printf pero devuelve la cadena formateada
$cadena=sprintf("la nota es %.2f\n",$nota);

print ord("a");
print ord("b");
print "\nLa letra asociada al numero 120 es ".chr(120);

//Para ver si un texto esta ordenado antes que otro utilizamos
//strcmp
if (strcmp("antonio fernandez","antonio Alba")<0)
    print "\nantonio va primero";
    else
    print "\njuan va primero";


$fraseT=trim($fraseT);

print "\n-{$fraseT}-";

$menu =["Home","Product","Gallery","About"];

$menuHtm= "<ol><li>".implode("<li>",$menu)."</ol>";

print "\n\n".$menuHtm;

//Con substr_count se cuenta la cantidad de veces que una
//subcadena aparece en otra
$numVeces = substr_count($menuHtm,"<li>",0,20);
print "\nSe ha encontrado la cadena <li> $numVeces";
?>