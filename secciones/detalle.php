<?php

$id      = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$producto = obtenerProductoPorId($id);

if (!$producto):
?>
<main class="container py-5 text-center" aria-labelledby="heading-error">
    <i class="bi bi-exclamation-circle nv-error-icon" aria-hidden="true"></i>
    <h1 id="heading-error" class="nv-section-title mt-3">Producto no encontrado</h1>
    <p class="nv-body-text">El producto que buscás no existe o fue dado de baja.</p>
    <a href="index.php?seccion=productos" class="btn nv-btn-primary mt-3">
        <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>
        Volver al catálogo
    </a>
</main>
<?php return; endif; ?>

<main aria-labelledby="heading-detalle">

    <nav class="nv-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item">
                    <a href="index.php?seccion=productos">Productos</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="index.php?seccion=categorias&cat=<?= urlencode($producto->getCategoria()) ?>">
                        <?= htmlspecialchars($producto->getCategoriaFormateada()) ?>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= htmlspecialchars($producto->getNombre()) ?>
                </li>
            </ol>
        </div>
    </nav>

    <section class="py-5">
        <div class="container">
            <div class="row gy-5 align-items-start">

                <div class="col-lg-6">
                    <div class="nv-detail-img">
                        <img src="<?= htmlspecialchars($producto->getImagen()) ?>"
                             alt="<?= htmlspecialchars($producto->getNombre()) ?>"
                             class="nv-product-img">
                    </div>
                </div>

                <div class="col-lg-6">

                    <p class="nv-eyebrow mb-1"><?= htmlspecialchars($producto->getMarca()) ?></p>
                    <h1 class="nv-detail-title" id="heading-detalle">
                        <?= htmlspecialchars($producto->getNombre()) ?>
                    </h1>

                    <div class="nv-detail-price-row">
                        <span class="nv-detail-price">
                            <?= $producto->getPrecioFormateado() ?>
                        </span>
                        <?php if ($producto->estaDisponible()): ?>
                            <span class="nv-badge-stock nv-badge-stock--ok">
                                <i class="bi bi-check-circle" aria-hidden="true"></i>
                                En stock — <?= $producto->getStock() ?> unidades
                            </span>
                        <?php else: ?>
                            <span class="nv-badge-stock nv-badge-stock--out">
                                <i class="bi bi-x-circle" aria-hidden="true"></i>
                                Sin stock
                            </span>
                        <?php endif; ?>
                    </div>

                    <p class="nv-body-text mt-4">
                        <?= htmlspecialchars($producto->getDescripcion()) ?>
                    </p>

                    <div class="nv-detail-block mt-4">
                        <h2 class="nv-detail-label">Talles disponibles</h2>
                        <div class="d-flex flex-wrap gap-2 mt-2">
                            <?php foreach ($producto->getTalle() as $t): ?>
                                <span class="nv-talle-tag"><?= htmlspecialchars($t) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="nv-detail-block mt-4">
                        <h2 class="nv-detail-label">Colores disponibles</h2>
                        <div class="d-flex flex-wrap gap-2 mt-2">
                            <?php foreach ($producto->getColores() as $c): ?>
                                <span class="nv-color-tag">
                                    <i class="bi bi-circle-fill" aria-hidden="true"></i>
                                    <?= htmlspecialchars($c) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="nv-detail-block mt-4">
                        <h2 class="nv-detail-label">Ficha técnica</h2>
                        <table class="table nv-specs-table mt-2"
                               aria-label="Especificaciones del producto">
                            <tbody>
                                <tr>
                                    <th scope="row">Marca</th>
                                    <td><?= htmlspecialchars($producto->getMarca()) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Categoría</th>
                                    <td><?= htmlspecialchars($producto->getCategoriaFormateada()) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Género</th>
                                    <td><?= htmlspecialchars($producto->getGeneroFormateado()) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Temporada</th>
                                    <td><?= htmlspecialchars($producto->getTemporada()) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Origen</th>
                                    <td><?= htmlspecialchars($producto->getOrigen()) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Calce</th>
                                    <td><?= htmlspecialchars($producto->getCalce()) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Stock</th>
                                    <td><?= $producto->estaDisponible() ? 'En stock (' . $producto->getStock() . ' unidades)' : 'Sin stock' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Lanzamiento</th>
                                    <td>
                                        <time datetime="<?= htmlspecialchars($producto->getFechaLanzamiento()) ?>">
                                            <?= $producto->getFechaFormateada() ?>
                                        </time>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="index.php?seccion=contacto" class="btn nv-btn-primary">
                            <i class="bi bi-envelope me-2" aria-hidden="true"></i>
                            Consultar por este producto
                        </a>
                        <a href="index.php?seccion=productos" class="btn nv-btn-outline">
                            <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>
                            Volver al catálogo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
