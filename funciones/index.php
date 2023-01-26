<?php

include("php/cabecera.php");

switch ($main_content)
{
    case MAIN_FORM:
        include("php/mainbody.php");
        break;
    case MAIN_CATALOG:
        include("php/catalog.php");
        break;
    case MAIN_WELCOME:
        include("php/welcome.php");
        break;

}


include("php/footer.php");


?>