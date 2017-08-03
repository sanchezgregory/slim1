<?php
class db{
    private $host = "localhost";
    private $user = "root";
    private $password = "123";
    private $db = "products";

    public function conectar()
    {
        $conexion_mysql = "mysql:host=$this->host;dbname=$this->db";
        $conexion = new PDO($conexion_mysql, $this->user, $this->password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // con esto se arregla la codificacion de utf8

        $conexion = exec("set names utf8");

        return $conexion;

    }
}