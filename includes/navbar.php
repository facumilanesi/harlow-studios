<?php
$seccionActual = $_GET['seccion'] ?? 'inicio';

$menu = [
    'inicio'     => ['label' => 'Inicio',    'icon' => 'bi-house'],
    'productos'  => ['label' => 'Productos', 'icon' => 'bi-grid'],
    'categorias' => ['label' => 'Categorías','icon' => 'bi-tags'],
    'contacto'   => ['label' => 'Contacto',  'icon' => 'bi-envelope'],
    'alumno'     => ['label' => 'Alumno',    'icon' => 'bi-person'],
];
?>
<nav class="navbar navbar-expand-lg nv-navbar sticky-top" aria-label="Navegación principal">
    <div class="container">

        <a class="navbar-brand nv-brand" href="index.php">
            HARLOW <span>STUDIO</span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navMain"
                aria-controls="navMain"
                aria-expanded="false"
                aria-label="Abrir menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto gap-1" role="list">
                <?php foreach ($menu as $clave => $item): ?>
                <li class="nav-item" role="listitem">
                    <a class="nav-link <?= $seccionActual === $clave ? 'active' : '' ?>"
                       href="index.php?seccion=<?= $clave ?>"
                       aria-current="<?= $seccionActual === $clave ? 'page' : 'false' ?>">
                        <?= $item['label'] ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</nav>
