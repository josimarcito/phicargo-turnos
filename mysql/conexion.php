<?php

define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DATA","phicargo");

function conectar(){

    try{
        $cn = new mysqli(HOST, USER, PASS, DATA);
        if($cn->connect_error){
            die("Error al tratar de conectarse a la base de datos");
        }else{
            echo "";
        }
    }catch(Exception $e){
        die("Error en el acceso a la base de datos");
    }
return $cn;
}