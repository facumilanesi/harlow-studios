<main aria-labelledby="heading-contacto">

    <header class="nv-page-header">
        <div class="container">
            <span class="nv-eyebrow">Escribinos</span>
            <h1 class="nv-page-title" id="heading-contacto">Contacto</h1>
            <p class="nv-page-sub">¿Tenés dudas sobre talles, envíos o productos? Estamos para ayudarte.</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row gy-5">

                <div class="col-lg-4">
                    <div class="nv-contact-info">
                        <h2 class="nv-detail-label mb-4">Información de contacto</h2>

                        <address class="nv-contact-list">
                            <div class="nv-contact-item">
                                <div class="nv-contact-icon">
                                    <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <strong>Dirección</strong>
                                    <p>Nazarre 4586<br>Buenos Aires, Argentina</p>
                                </div>
                            </div>
                            <div class="nv-contact-item">
                                <div class="nv-contact-icon">
                                    <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <strong>Email</strong>
                                    <p><a href="mailto:facundo.milanesi@davinci.edu.ar">facundo.milanesi@davinci.edu.ar</a></p>
                                </div>
                            </div>
                            <div class="nv-contact-item">
                                <div class="nv-contact-icon">
                                    <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <strong>Teléfono</strong>
                                    <p><a href="tel:+541167121251">+54 11 6712-1251</a></p>
                                </div>
                            </div>
                            <div class="nv-contact-item">
                                <div class="nv-contact-icon">
                                    <i class="bi bi-clock-fill" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <strong>Horarios</strong>
                                    <p>Lun–Vie: 9:00–18:00 hs<br>Sáb: 10:00–14:00 hs</p>
                                </div>
                            </div>
                        </address>

                        <div class="mt-4">
                            <p class="nv-detail-label mb-3">Seguinos</p>
                            <div class="d-flex gap-3">
                                <a href="https://www.instagram.com/facumila15/" target="_blank" rel="noopener noreferrer"
                                   class="nv-social-btn" aria-label="Instagram de Harlow Studio">
                                    <i class="bi bi-instagram" aria-hidden="true"></i>
                                </a>
                                <a href="https://www.facebook.com/facundo.milanesi/" target="_blank" rel="noopener noreferrer"
                                   class="nv-social-btn" aria-label="Facebook de Harlow Studio">
                                    <i class="bi bi-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="https://www.tiktok.com/@facumila15" target="_blank" rel="noopener noreferrer"
                                   class="nv-social-btn" aria-label="TikTok de Harlow Studio">
                                    <i class="bi bi-tiktok" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="nv-form-wrapper">
                        <h2 class="nv-detail-label mb-4">Envianos un mensaje</h2>

                        <form action="procesar.php"
                              method="POST"
                              class="nv-form"
                              aria-label="Formulario de contacto"
                              novalidate>

                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <label for="nombre" class="nv-label">
                                        Nombre <span class="text-danger" aria-hidden="true">*</span>
                                    </label>
                                    <input type="text" id="nombre" name="nombre"
                                           class="form-control nv-input"
                                           placeholder="Nombre"
                                           required aria-required="true">
                                </div>
                                <div class="col-sm-6">
                                    <label for="apellido" class="nv-label">
                                        Apellido <span class="text-danger" aria-hidden="true">*</span>
                                    </label>
                                    <input type="text" id="apellido" name="apellido"
                                           class="form-control nv-input"
                                           placeholder="Apellido"
                                           required aria-required="true">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="nv-label">
                                    Correo electrónico <span class="text-danger" aria-hidden="true">*</span>
                                </label>
                                <input type="email" id="email" name="email"
                                       class="form-control nv-input"
                                       placeholder="tu@email.com"
                                       required aria-required="true">
                            </div>

                            <div class="mb-3">
                                <label for="preferencia" class="nv-label">
                                    Preferencia de estilo
                                </label>
                                <select id="preferencia" name="preferencia"
                                        class="form-select nv-input"
                                        aria-label="Seleccioná tu estilo preferido">
                                    <option value="" disabled selected>Seleccioná una opción…</option>
                                    <option value="Minimalista">Minimalista</option>
                                    <option value="Casual">Casual</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Formal">Formal</option>
                                    <option value="Streetwear">Streetwear</option>
                                    <option value="Sin preferencia">Sin preferencia definida</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="mensaje" class="nv-label">
                                    Mensaje <span class="text-danger" aria-hidden="true">*</span>
                                </label>
                                <textarea id="mensaje" name="mensaje"
                                          class="form-control nv-input"
                                          rows="5"
                                          placeholder="Escribí tu consulta acá…"
                                          required aria-required="true"></textarea>
                            </div>

                            <p class="nv-form-note mb-3">
                                <span class="text-danger" aria-hidden="true">*</span> Campos obligatorios
                            </p>

                            <button type="submit" class="btn nv-btn-primary w-100">
                                <i class="bi bi-send me-2" aria-hidden="true"></i>
                                Enviar mensaje
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
