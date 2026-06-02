<section class="nv-hero">
    <div class="container nv-hero-inner">
        <div class="nv-hero-content">
            <span class="nv-eyebrow">Nueva colección — Streetwear 2026</span>

            <h1 class="nv-hero-title">
                Estilo urbano<br>
                <em>para todos los días.</em>
            </h1>

            <p class="nv-hero-sub">
                Prendas cómodas, simples y fáciles de combinar.<br>
                Streetwear minimalista para todos los días.
            </p>

            <div class="nv-hero-btns">
                <a href="index.php?seccion=productos" class="nv-btn-primary">
                    Ver productos
                    <span class="nv-btn-arrow">→</span>
                </a>

                <a href="index.php?seccion=categorias" class="nv-btn-outline">
                    Explorar categorías
                </a>
            </div>
        </div>
    </div>
</section>

<?php

$destacados = obtenerProductosDestacados(4);
?>

<section class="nv-about py-6" aria-labelledby="heading-marca">
    <div class="container">
        <div class="row align-items-center gy-5">

            <div class="col-lg-6">
                <span class="nv-eyebrow">Quiénes somos</span>
                <h2 class="nv-section-title" id="heading-marca">
                    Básicos modernos,<br><em>para usar siempre.</em>
                </h2>
                <p class="nv-body-text">
                    Harlow Studio nace con una idea simple: crear prendas urbanas, cómodas y fáciles de combinar.
                    <strong>Diseños limpios, siluetas streetwear y básicos pensados para el uso cotidiano.</strong>
                </p>
                <p class="nv-body-text">
                    Cada prenda que fabricamos pasa por un proceso de selección estricto de materiales.
                    Nada recargado. Nada difícil de usar.
                    <em>Solo prendas versátiles para moverte con estilo.</em>
                </p>
            </div>

            <div class="col-lg-6">
                <div class="nv-about-grid">
                    <div class="nv-about-tile nv-tile--cream">
                        <p><strong>Calidad garantizada</strong><br>Prendas resistentes para uso diario.</p>
                    </div>
                    <div class="nv-about-tile nv-tile--camel">
                        <p><strong>Cambios y devoluciones</strong><br>Compra simple y sin complicaciones.</p>
                    </div>
                    <div class="nv-about-tile nv-tile--camel">
                        <p><strong>Envío gratis</strong><br>En compras mayores a $80.000.</p>
                    </div>
                    <div class="nv-about-tile nv-tile--cream">
                        <p><strong>Materiales seleccionados</strong><br>Textiles cómodos y fáciles de usar.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="nv-featured py-6" aria-labelledby="heading-novedades">
    <div class="container">

        <div class="nv-section-header mb-5">
            <span class="nv-eyebrow">Lo más nuevo</span>
            <h2 class="nv-section-title" id="heading-novedades">Novedades</h2>
            <p class="nv-body-text">Los últimos lanzamientos de la temporada.</p>
        </div>

        <div class="row g-4">
            <?php foreach ($destacados as $producto): ?>
            <div class="col-sm-6 col-lg-3">
                <article class="nv-card h-100">

                    <div class="nv-card-img">
                        <img src="<?= htmlspecialchars($producto->getImagen()) ?>"
                            alt="<?= htmlspecialchars($producto->getNombre()) ?>"
                            class="nv-card-product-img">
                        <span class="nv-cat-pill">
                            <?= htmlspecialchars($producto->getCategoriaFormateada()) ?>
                        </span>
                    </div>
                    <div class="nv-card-body">
                        <p class="nv-card-meta">
                            <?= htmlspecialchars($producto->getGeneroFormateado()) ?>
                            · <?= htmlspecialchars($producto->getTallesComoTexto()) ?>
                        </p>
                        <h3 class="nv-card-title">
                            <?= htmlspecialchars($producto->getNombre()) ?>
                        </h3>
                        <p class="nv-card-desc">
                            <?= htmlspecialchars($producto->getDescripcionCorta(80)) ?>
                        </p>
                        <div class="nv-card-footer">
                            <span class="nv-price">
                                <?= $producto->getPrecioFormateado() ?>
                            </span>
                            <a href="index.php?seccion=detalle&id=<?= $producto->getId() ?>"
                               class="btn nv-btn-sm"
                               aria-label="Ver detalle de <?= htmlspecialchars($producto->getNombre()) ?>">
                                Ver más
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="index.php?seccion=productos" class="btn nv-btn-outline">
                Ver todos los productos
                        <span class="nv-btn-arrow">→</span>
            </a>
        </div>

    </div>
</section>

<section class="nv-quickcats py-6" aria-labelledby="heading-cats">
    <div class="container">
        <div class="nv-section-header mb-5">
            <span class="nv-eyebrow">Explorar</span>
            <h2 class="nv-section-title" id="heading-cats">Categorías</h2>
        </div>
        <div class="row g-3">
            <?php
            $cats = [
                'remeras'  => ['icon' => 'bi-person',          'color' => 'navy'],
                'jeans'    => ['icon' => 'bi-briefcase',       'color' => 'teal'],
                'buzos'  => ['icon' => 'bi-cloud-drizzle',   'color' => 'sky'],
                'bermudas'  => ['icon' => 'bi-stars',           'color' => 'beige'],
            ];
            foreach ($cats as $slug => $info):
                $total = contarPorCategoria($slug);
            ?>
            <div class="col-6 col-md-3">
                <a href="index.php?seccion=categorias&cat=<?= $slug ?>"
                   class="nv-quickcat nv-quickcat--<?= $info['color'] ?>"
                   aria-label="Ver <?= ucfirst($slug) ?> (<?= $total ?> productos)">
                    <i class="<?= $info['icon'] ?>" aria-hidden="true"></i>
                    <strong><?= ucfirst($slug) ?></strong>
                    <span><?= $total ?> productos</span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
