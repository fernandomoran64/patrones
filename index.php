<?php
// 1. Cargar autoload de Composer
require __DIR__ . '/vendor/autoload.php';

// 2. Usar el namespace de tus clases (configurado en composer.json)
use App\Patrones\Ejemplo; // Ajusta según tu estructura

// 3. Conexión a MongoDB
try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->proyecto_patrones; // Nombre de tu BD
    
    // Ejemplo: Insertar un documento
    $collection = $db->ejemplos;
    $result = $collection->insertOne([
        'nombre' => 'Patrón Singleton',
        'fecha' => new DateTime(),
    ]);
    
    echo "Documento insertado con ID: " . $result->getInsertedId() . "\n";

} catch (Exception $e) {
    die("Error de MongoDB: " . $e->getMessage());
}

// 4. Ejemplo de uso de una clase propia
$ejemplo = new Ejemplo();
echo $ejemplo->saludar();
