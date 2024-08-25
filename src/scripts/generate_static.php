<?php
function save_page_as_html($php_file, $output_file) {
    // Construir la URL para acceder al archivo PHP en el servidor embebido de PHP
    $url = "http://localhost:8000/" . $php_file;
    
    // Obtener el contenido generado por PHP
    $content = file_get_contents($url);

    if ($content === false) {
        echo "Error al obtener contenido de $url\n";
    } else {
        // Guardar el contenido en un archivo HTML
        file_put_contents($output_file, $content);
        echo "Archivo generado: $output_file\n";
    }
}

// Páginas a convertir
$pages = [
    'index.php' => 'index.html',
];

foreach ($pages as $php_file => $output_file) {
    save_page_as_html($php_file, $output_file);
}
