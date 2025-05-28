<?php
session_start(); // Asegúrate de ponerlo al inicio

require_once("config.php");

// Valor por defecto si no está configurado
$driver = isset($_SESSION['db_driver']) ? $_SESSION['db_driver'] : 'PDO';

class Conectar {
    public static function conexion() {
        global $driver;
        $host = "localhost";
        $dbname = "mi_base";
        $user = "root";
        $pass = "";

        if ($driver=="PDO") {
            try {
                $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conexion;
            } catch (PDOException $e) {
                die("❌ Error con PDO: " . $e->getMessage());
            }
        } elseif ($driver == "mysqli") {
            $conexion = new mysqli($host, $user, $pass, $dbname);
            if ($conexion->connect_error) {
                die("❌ Error con MySQLi: " . $conexion->connect_error);
            }
            return $conexion;
        } else {
            die("❌ Tipo de conexión no válido");
        }
    }
}