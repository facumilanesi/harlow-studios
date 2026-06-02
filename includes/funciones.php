<?php

require_once __DIR__ . '/../clases/Producto.php';

define('RUTA_JSON', __DIR__ . '/../data/productos.json');

function obtenerProductos(): array {
    $json = file_get_contents(RUTA_JSON);

    $datos = json_decode($json, true);

    if (!is_array($datos)) {
        return [];
    }

    $productos = [];
    foreach ($datos as $item) {
        $productos[] = new Producto($item);
    }

    return $productos;
}

function obtenerProductoPorId(int $id): ?Producto {
    $productos = obtenerProductos();

    foreach ($productos as $producto) {
        if ($producto->getId() === $id) {
            return $producto;
        }
    }

    return null;
}

function obtenerCategorias(): array {
    $productos  = obtenerProductos();
    $categorias = [];

    foreach ($productos as $producto) {
        $cat = $producto->getCategoria();
        if (!in_array($cat, $categorias)) {
            $categorias[] = $cat;
        }
    }

    sort($categorias);
    return $categorias;
}

function filtrarPorCategoria(string $categoria): array {
    $productos = obtenerProductos();
    $resultado = [];

    foreach ($productos as $producto) {
        if (strtolower($producto->getCategoria()) === strtolower($categoria)) {
            $resultado[] = $producto;
        }
    }

    return $resultado;
}

function obtenerProductosDestacados(int $cantidad = 4): array {
    $productos = obtenerProductos();

    usort($productos, function(Producto $a, Producto $b): int {
        return strcmp($b->getFechaLanzamiento(), $a->getFechaLanzamiento());
    });

    return array_slice($productos, 0, $cantidad);
}

function contarPorCategoria(string $categoria): int {
    return count(filtrarPorCategoria($categoria));
}

function obtenerIconoCategoria(string $categoria): string {
    return match(strtolower($categoria)) {
        'remeras'  => 'bi-person',
        'jeans'    => 'bi-briefcase',
        'buzos'    => 'bi-cloud-drizzle',
        'bermudas' => 'bi-stars',
        default    => 'bi-tag',
    };
}
