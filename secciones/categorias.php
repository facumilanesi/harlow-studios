<?php

$categorias      = obtenerCategorias();
$categoriaActual = isset($_GET['cat']) ? trim($_GET['cat']) : null;
$productosFiltrados = $categoriaActual ? filtrarPorCategoria($categoriaActual) : [];

?>

<main aria-labelledby="heading-categorias">

    <header class="nv-page-header">
        <div class="container">
            <span class="nv-eyebrow">Colecciones</span>
            <h1 class="nv-page-title" id="heading-categorias">Categorías</h1>
            <p class="nv-page-sub">
                Elegí una categoría y mirá los productos disponibles.
            </p>
        </div>
    </header>

    <section class="py-5" aria-label="Listado de categorías">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <?php foreach ($categorias as $cat):
                    $activa = $categoriaActual === $cat ? 'nv-cat-card--active' : '';
                ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <a href="index.php?seccion=categorias&cat=<?= urlencode($cat) ?>"
                       class="nv-cat-card <?= $activa ?>"
                       aria-label="Ver <?= htmlspecialchars(ucfirst($cat)) ?>"
                       aria-current="<?= $activa ? 'true' : 'false' ?>">
                        <h2 class="nv-cat-name"><?= htmlspecialchars(ucfirst($cat)) ?></h2>
                        <span class="nv-cat-count">Ver colección</span>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php if ($categoriaActual && !empty($productosFiltrados)): ?>
    <section class="nv-filtered py-5" aria-labelledby="heading-filtrado">
        <div class="container">
            <div class="nv-section-header mb-5">
                <span class="nv-eyebrow">Mostrando</span>
                <h2 class="nv-section-title" id="heading-filtrado">
                    <?= htmlspecialchars(ucfirst($categoriaActual)) ?>
                </h2>
                <p class="nv-body-text">
                    <?= count($productosFiltrados) ?> productos encontrados
                </p>
            </div>

            <div class="row g-4">
                <?php foreach ($productosFiltrados as $producto): ?>
                <div class="col-sm-6 col-lg-4">
                    <article class="nv-card h-100"
                             aria-label="<?= htmlspecialchars($producto->getNombre()) ?>">
                        <div class="nv-card-img">
                        <img src="<?= htmlspecialchars($producto->getImagen()) ?>"
                            alt="<?= htmlspecialchars($producto->getNombre()) ?>"
                            class="nv-card-product-img">
                            <span class="nv-cat-pill">
                                <?= htmlspecialchars($producto->getCategoriaFormateada()) ?>
                            </span>
                            <span class="nv-gender-pill">
                                <?= htmlspecialchars($producto->getGeneroFormateado()) ?>
                            </span>
                        </div>
                        <div class="nv-card-body">
                            <p class="nv-card-meta"><?= htmlspecialchars($producto->getTallesComoTexto()) ?></p>
                            <h3 class="nv-card-title"><?= htmlspecialchars($producto->getNombre()) ?></h3>
                            <p class="nv-card-desc">
                                <?= htmlspecialchars($producto->getDescripcionCorta(90)) ?>
                            </p>
                            <p class="nv-card-colors">
                                <i class="bi bi-palette2" aria-hidden="true"></i>
                                <?= htmlspecialchars($producto->getColoresComoTexto()) ?>
                            </p>
                            <div class="nv-card-footer">
                                <span class="nv-price"><?= $producto->getPrecioFormateado() ?></span>
                                <a href="index.php?seccion=detalle&id=<?= $producto->getId() ?>"
                                   class="btn nv-btn-sm"
                                   aria-label="Ver detalle de <?= htmlspecialchars($producto->getNombre()) ?>">
                                    Ver detalle
                                    <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
    <?php elseif ($categoriaActual && empty($productosFiltrados)): ?>
    <div class="container py-4 text-center">
        <p class="nv-body-text">No hay productos en esta categoría por el momento.</p>
    </div>
    <?php endif; ?>

</main>
