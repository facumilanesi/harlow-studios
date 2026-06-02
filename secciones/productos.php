<?php

$productos = obtenerProductos();
$total     = count($productos);
?>

<main aria-labelledby="heading-productos">

    <header class="nv-page-header">
        <div class="container">
            <span class="nv-eyebrow">Catálogo completo</span>
            <h1 class="nv-page-title" id="heading-productos">Todos los productos</h1>
            <p class="nv-page-sub">
                <?= $total ?> prendas disponibles. Encontrá tu próximo básico.
            </p>
        </div>
    </header>

    <section class="py-5">
        <div class="container">

            <p class="nv-results-txt mb-4">
                Mostrando <strong><?= $total ?></strong> productos
            </p>

            <div class="row g-4">
                <?php foreach ($productos as $producto): ?>
                <div class="col-sm-6 col-lg-4">
                    <article class="nv-card h-100"
                             aria-label="<?= htmlspecialchars($producto->getNombre()) ?>">

                        <div class="nv-card-img">
                        <img src="<?= htmlspecialchars($producto->getImagen()) ?>"
                            alt="<?= htmlspecialchars($producto->getNombre()) ?>"
                            class="img-fluid nv-card-product-img">
                            <span class="nv-cat-pill">
                                <?= htmlspecialchars($producto->getCategoriaFormateada()) ?>
                            </span>
                            <span class="nv-gender-pill">
                                <?= htmlspecialchars($producto->getGeneroFormateado()) ?>
                            </span>
                        </div>

                        <div class="nv-card-body">
                            <p class="nv-card-meta">
                                <?= htmlspecialchars($producto->getTallesComoTexto()) ?>
                            </p>
                            <h2 class="nv-card-title">
                                <?= htmlspecialchars($producto->getNombre()) ?>
                            </h2>
                            <p class="nv-card-desc">
                                <?= htmlspecialchars($producto->getDescripcionCorta(90)) ?>
                            </p>

                            <p class="nv-card-colors">
                                <i class="bi bi-palette2" aria-hidden="true"></i>
                                <?= htmlspecialchars($producto->getColoresComoTexto()) ?>
                            </p>

                            <div class="nv-card-footer">
                                <div>
                                    <span class="nv-price">
                                        <?= $producto->getPrecioFormateado() ?>
                                    </span>

                                    <?php if ($producto->estaDisponible()): ?>
                                        <small class="d-block nv-stock-ok">
                                            <i class="bi bi-check-circle" aria-hidden="true"></i>
                                            Stock disponible
                                        </small>
                                    <?php else: ?>
                                        <small class="d-block nv-stock-out">Sin stock</small>
                                    <?php endif; ?>
                                </div>
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

</main>
