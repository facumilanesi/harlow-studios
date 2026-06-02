<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?seccion=contacto');
    exit;
}

$nombre      = htmlspecialchars(trim($_POST['nombre']      ?? ''), ENT_QUOTES, 'UTF-8');
$apellido    = htmlspecialchars(trim($_POST['apellido']    ?? ''), ENT_QUOTES, 'UTF-8');
$email       = htmlspecialchars(trim($_POST['email']       ?? ''), ENT_QUOTES, 'UTF-8');
$preferencia = htmlspecialchars(trim($_POST['preferencia'] ?? ''), ENT_QUOTES, 'UTF-8');
$mensaje     = htmlspecialchars(trim($_POST['mensaje']     ?? ''), ENT_QUOTES, 'UTF-8');

$errores = [];

if (empty($nombre))   $errores[] = 'El nombre es obligatorio.';
if (empty($apellido)) $errores[] = 'El apellido es obligatorio.';
if (empty($email) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'El correo electrónico no es válido.';
}
if (empty($mensaje))  $errores[] = 'El mensaje es obligatorio.';

require_once 'includes/funciones.php';
$tituloPagina = 'Mensaje enviado';
require_once 'includes/head.php';
require_once 'includes/navbar.php';
?>

<main aria-labelledby="heading-proceso">

    <header class="nv-page-header">
        <div class="container">
            <span class="nv-eyebrow">Formulario de contacto</span>
            <h1 class="nv-page-title" id="heading-proceso">
                <?= empty($errores) ? 'Mensaje recibido' : 'Errores en el formulario' ?>
            </h1>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    <?php if (!empty($errores)): ?>

                    <div class="nv-alert nv-alert--error" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2" aria-hidden="true"></i>
                        <div>
                            <strong>Corregí los siguientes errores:</strong>
                            <ul class="mb-0 mt-2">
                                <?php foreach ($errores as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="index.php?seccion=contacto" class="btn nv-btn-primary">
                            <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>
                            Volver al formulario
                        </a>
                    </div>

                    <?php else: ?>

                    <div class="nv-alert nv-alert--success" role="status">
                        <i class="bi bi-check-circle-fill me-2" aria-hidden="true"></i>
                        <div>
                            <strong>¡Mensaje enviado con éxito!</strong>
                            <p class="mb-0 mt-1">
                                Nos comunicaremos con vos a la brevedad.
                            </p>
                        </div>
                    </div>

                    <div class="nv-form-wrapper mt-4">
                        <h2 class="nv-detail-label mb-4">
                            <i class="bi bi-clipboard-check me-2" aria-hidden="true"></i>
                            Resumen de tu mensaje
                        </h2>

                        <table class="table nv-specs-table"
                               aria-label="Datos del formulario enviado">
                            <tbody>
                                <tr>
                                    <th scope="row">Nombre</th>
                                    <td><?= $nombre ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellido</th>
                                    <td><?= $apellido ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Correo electrónico</th>
                                    <td><a href="mailto:<?= $email ?>"><?= $email ?></a></td>
                                </tr>
                                <tr>
                                    <th scope="row">Preferencia de estilo</th>
                                    <td><?= $preferencia !== '' ? $preferencia : 'No especificada' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Mensaje</th>
                                    <td><?= nl2br($mensaje) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="index.php?seccion=inicio" class="btn nv-btn-primary">
                            <i class="bi bi-house me-2" aria-hidden="true"></i>
                            Volver al inicio
                        </a>
                        <a href="index.php?seccion=productos" class="btn nv-btn-outline">
                            <i class="bi bi-grid me-2" aria-hidden="true"></i>
                            Ver productos
                        </a>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

</main>

<?php require_once 'includes/footer.php'; ?>
