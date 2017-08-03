<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Obtener todos los clientes:

$app->get('/api/products', function(Request $request, Response $response){
    $sql = "SELECT * FROM products";
    try {
        $db = new db();
        $db = $db->conectar();
        $ejecutar = $db->query($sql);
        $products = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //exportar en formato json
        echo json_encode($products);
    } catch (PDOException $e){
        echo '{"error": {"text":".$e->getMessage()."}';
    }
});