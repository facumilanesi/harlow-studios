<?php

require_once 'includes/funciones.php';

$seccionesPermitidas = ['inicio', 'productos', 'categorias', 'detalle', 'contacto', 'alumno'];

$seccion = isset($_GET['seccion']) ? trim($_GET['seccion']) : 'inicio';

if (!in_array($seccion, $seccionesPermitidas)) {
    $seccion = 'inicio';
}

$titulos = [
    'inicio'     => 'Inicio',
    'productos'  => 'Productos',
    'categorias' => 'Categorías',
    'detalle'    => 'Detalle de producto',
    'contacto'   => 'Contacto',
    'alumno'     => 'Alumno',
];
$tituloPagina = $titulos[$seccion] ?? 'Inicio';

require_once 'includes/head.php';
require_once 'includes/navbar.php';

$archivoSeccion = 'secciones/' . $seccion . '.php';

if (file_exists($archivoSeccion)) {
    require_once $archivoSeccion;
} else {
    echo '<main class="container py-5 text-center"><h2>Sección no encontrada.</h2></main>';
}

require_once 'includes/footer.php';
