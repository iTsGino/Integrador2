<?php

class Database{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "BDColegio";
    private $charset = "utf8";
    
    function Conectar(){
        try{
            $Conn = "mysql:host=" .$this->server. "; dbname=" .$this->database. "; charset=" .$this->charset;
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($Conn, $this->user, $this->pass, $option);
            return $pdo;
        } catch(PDOException $e){
            echo 'Error Conexion: '.$e->getMessage();
            exit;
        }
    }
}

/*
$server = "localhost";
$user = "root";
$pass = "";
$database = "BDColegio";

try{
    $conn = new PDO("mysql:host=$server;dbname=$database", $user, $pass);
} catch (PDOException $e){
    die('Connected failed: '.$e->getMessage());
}
 */

function file_name($string){
    // Tranformamos todo a minusculas
    $string = strtolower($string);
    
    //Rememplazamos caracteres especiales latinos
    $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
    $repl = array('a', 'e', 'i', 'o', 'u', 'n');
    $string = str_replace($find, $repl, $string);

    // Añadimos los guiones
    $find = array(' ', '&', '\r\n', '\n', '+');
    $string = str_replace($find, '-', $string);

    // Eliminamos y Reemplazamos otros carácteres especiales
    $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
    $repl = array('', '-', '');
    $string = preg_replace($find, $repl, $string);
    
    return $string;
}

?>