
<div class="mb-4">
    <h1 class="h3 font-weight-bold">Configuración del Sistema</h1>
    <p class="text-muted">Gestione la información básica, usuarios y preferencias de su negocio.</p>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-1 font-weight-bold">Información de la Empresa</h5>
        <p class="text-muted small mb-0">Estos datos aparecerán en sus facturas y reportes oficiales.
        </p>
    </div>
    <div class="card-body p-4">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="small font-weight-bold text-muted" for="businessName">Nombre
                        Comercial</label>
                    <input class="form-control" id="businessName" type="text"
                        value="Soluciones Tech S.A. de C.V." />
                </div>
                <div class="form-group col-md-6">
                    <label class="small font-weight-bold text-muted" for="taxId">RFC / Identificación
                        Fiscal</label>
                    <input class="form-control" id="taxId" placeholder="ABC123456XYZ" type="text" />
                </div>
            </div>
            <div class="form-group">
                <label class="small font-weight-bold text-muted" for="address">Dirección Fiscal</label>
                <textarea class="form-control" id="address"
                    rows="3">Av. Reforma 450, Piso 12, Ciudad de México, CP 06600</textarea>
                <small class="form-text text-muted">Incluya calle, número, colonia y código
                    postal.</small>
            </div>
            <hr class="my-4" />
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="small font-weight-bold text-muted" for="currency">Moneda Base</label>
                    <select class="custom-select" id="currency">
                        <option selected="" value="SOL">Nuevo Sol (SOL)</option>
                        <option value="USD">Dólar Estadounidense (USD)</option>
                        <option value="EUR">Euro (EUR)</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="small font-weight-bold text-muted" for="timezone">Zona Horaria</label>
                    <select class="custom-select" id="timezone">
                        <option selected="" value="GMT-6">(GMT-06:00) Mexico City</option>
                        <option value="GMT-5">(GMT-05:00) New York</option>
                        <option value="GMT+1">(GMT+01:00) Madrid</option>
                    </select>
                </div>
            </div>
            <hr class="my-4" />
            <h6 class="text-muted small font-weight-bold text-uppercase mb-3">Preferencias del Sistema
            </h6>
            <div class="card bg-light border-0 mb-2">
                <div class="card-body d-flex justify-content-between align-items-center py-3">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-info-circle text-primary mr-3"></i>
                        <div>
                            <p class="mb-0 font-weight-bold small">Alertas de Inventario Bajo</p>
                            <small class="text-muted">Notificar cuando el stock sea menor al punto de
                                reorden.</small>
                        </div>
                    </div>
                    <div class="custom-control custom-switch">
                        <input checked="" class="custom-control-input" id="switch1" type="checkbox" />
                        <label class="custom-control-label" for="switch1"></label>
                    </div>
                </div>
            </div>
            <div class="card bg-light border-0 mb-4">
                <div class="card-body d-flex justify-content-between align-items-center py-3">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-plug text-primary mr-3"></i>
                        <div>
                            <p class="mb-0 font-weight-bold small">Modo Offline (Sincronización)</p>
                            <small class="text-muted">Permite realizar ventas sin conexión a
                                internet.</small>
                        </div>
                    </div>
                    <div class="custom-control custom-switch">
                        <input class="custom-control-input" id="switch2" type="checkbox" />
                        <label class="custom-control-label" for="switch2"></label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center border-top pt-4">
                <button class="btn btn-link text-muted font-weight-bold px-0" type="button">Descartar
                    cambios</button>
                <div>
                    <button class="btn btn-outline-secondary m-2 font-weight-bold" type="button">Vista
                        Previa</button>
                    <button class="btn btn-primary px-4 font-weight-bold" type="submit">
                        <i class="fa fa-save mr-1"></i> Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle bg-warning text-white p-2 mr-3 d-flex">
                        <i class="fa fa-shield"></i>
                    </div>
                    <h6 class="mb-0 font-weight-bold">Seguridad</h6>
                </div>
                <p class="small text-muted mb-3">Su última copia de seguridad fue generada hace 2 horas.
                </p>
                <a class="text-primary font-weight-bold small d-flex align-items-center" href="#">
                    Configurar respaldo automático 
                    <i class="fa fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle bg-success text-white p-2 mr-3 d-flex">
                        <i class="fa fa-check"></i>
                    </div>
                    <h6 class="mb-0 font-weight-bold">Plan Actual</h6>
                </div>
                <p class="small text-muted mb-3">Usted cuenta con el Plan Premium (Anual). Vence en 340
                    días.</p>
                <a class="text-primary font-weight-bold small d-flex align-items-center" href="#">
                    Gestionar suscripción 
                    <i class="fa fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>