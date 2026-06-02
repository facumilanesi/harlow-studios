<?php

class Producto {

    private int    $id;
    private string $nombre;
    private string $marca;
    private string $categoria;
    private string $genero;
    private float  $precio;
    private int    $stock;
    private string $fechaLanzamiento;
    private array  $talle;
    private array  $colores;
    private string $descripcion;
    private string $imagen;
    private string $temporada;
    private string $origen;
    private string $calce;

    public function __construct(array $datos) {
        $this->id               = (int)    $datos['id'];
        $this->nombre           = (string) $datos['nombre'];
        $this->marca            = (string) $datos['marca'];
        $this->categoria        = (string) $datos['categoria'];
        $this->genero           = (string) $datos['genero'];
        $this->precio           = (float)  $datos['precio'];
        $this->stock            = (int)    $datos['stock'];
        $this->fechaLanzamiento = (string) $datos['fecha_lanzamiento'];
        $this->talle            = (array)  $datos['talle'];
        $this->colores          = (array)  $datos['colores'];
        $this->descripcion      = (string) $datos['descripcion'];
        $this->imagen           = (string) $datos['imagen'];
        $this->temporada        = (string) ($datos['temporada'] ?? 'Sin especificar');
        $this->origen           = (string) ($datos['origen']    ?? 'Sin especificar');
        $this->calce            = (string) ($datos['calce']     ?? 'Sin especificar');
    }

    public function getId(): int            { return $this->id; }
    public function getNombre(): string     { return $this->nombre; }
    public function getMarca(): string      { return $this->marca; }
    public function getCategoria(): string  { return $this->categoria; }
    public function getGenero(): string     { return $this->genero; }
    public function getPrecio(): float      { return $this->precio; }
    public function getStock(): int         { return $this->stock; }
    public function getFechaLanzamiento(): string { return $this->fechaLanzamiento; }
    public function getTalle(): array       { return $this->talle; }
    public function getColores(): array     { return $this->colores; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getImagen(): string     { return $this->imagen; }
    public function getTemporada(): string  { return $this->temporada; }
    public function getOrigen(): string     { return $this->origen; }
    public function getCalce(): string      { return $this->calce; }

    public function getPrecioFormateado(): string {
        return '$' . number_format($this->precio, 0, ',', '.');
    }

    public function getDescripcionCorta(int $longitud = 100): string {
        if (mb_strlen($this->descripcion) <= $longitud) {
            return $this->descripcion;
        }
        return mb_substr($this->descripcion, 0, $longitud) . '…';
    }

    public function getTallesComoTexto(): string {
        return implode(' / ', $this->talle);
    }

    public function getColoresComoTexto(): string {
        return implode(', ', $this->colores);
    }

    public function estaDisponible(): bool {
        return $this->stock > 0;
    }

    public function getFechaFormateada(): string {
        $fecha = DateTime::createFromFormat('Y-m-d', $this->fechaLanzamiento);
        return $fecha ? $fecha->format('d/m/Y') : $this->fechaLanzamiento;
    }

    public function getCategoriaFormateada(): string {
        return ucfirst($this->categoria);
    }

    public function getGeneroFormateado(): string {
        return ucfirst($this->genero);
    }
}
