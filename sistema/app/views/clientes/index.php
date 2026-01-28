




    <div class="d-md-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800 font-weight-normal">Administración de Clientes</h1>
            <p class="text-muted mb-0">Directorio centralizado de gestión de clientes y ventas.</p>
        </div>
        <div class="mt-3 mt-md-0">
            <a class="btn btn-primary d-flex align-items-center" href="clientes/nuevo">
                <i class="fa fa-plus"></i>
                Añadir
            </a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">Total Clientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1,250</div>
                            <div class="mt-2 text-success small font-weight-bold">
                                <i class="fa fa-arrow-up"></i> +12% vs mes anterior
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">Clientes Nuevos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">42</div>
                            <div class="mt-2 text-muted small">Registrados en los últimos 30 días</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">Ticket Promedio</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$85.50</div>
                            <div class="mt-2 text-primary small">Valor de compra histórico</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white py-3 d-flex flex-wrap align-items-center justify-content-between">
            <form class="form-inline my-1">
                <div class="input-group">
                    <input class="form-control form-control-sm border-right-0" placeholder="Buscar cliente..."
                        style="width: 250px;" type="text" />
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-outline-secondary border-left-0" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="my-1">
                <button class="btn btn-sm btn-secondary mr-2 d-inline-flex align-items-center">
                    <i class="fa fa-filter"></i> Filtrar
                </button>
                <button class="btn btn-sm btn-info d-inline-flex align-items-center">
                    <i class="fa fa-download"></i> Exportar
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Nombre del Cliente</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Compras Totales</th>
                            <th>Última Visita</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($resultado as $cliente): ?>
                            <tr>
                                <td>
                                    <div class="font-weight-bold text-primary">
                                        <?= $cliente['nombre'].' '.$cliente['apellido'] ?>
                                    </div>
                                    <div class="customer-id">ID: CL-<?= $cliente['id'] ?></div>
                                </td>
                                <td class="text-muted"><?= $cliente['email'] ?></td>
                                <td class="text-muted">+52 555 123 4567</td>
                                <td class="font-weight-bold">$0.00</td>
                                <td>
                                    <?=  date('d/m/Y', strtotime($cliente['fecha_registro'])) ?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-info" title="Ver Historial">
                                        <i class="fa fa-history"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" title="Editar">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-top-0 d-flex align-items-center justify-content-between">
            <span class="small text-muted">Mostrando  <?= $pagina_actual ?> de <?= $total_paginas ?> paginas</span>
            <nav>
                <ul class="pagination pagination-sm">
                    <?php
                    // Mostrar la paginación
                    if ($pagina_actual > 1) {
                        echo " <li class='page-item'><a class='page-link' href='?pagina=" . ($pagina_actual - 1) . "'>Anterior</a></li>";
                    }
                        for ($i = 1; $i <= $total_paginas; $i++) {
                            if ($i == $pagina_actual) {
                                echo "<li class='page-item active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                            }
                        }
                    if ($pagina_actual < $total_paginas) {
                        echo " <li class='page-item'><a class='page-link' href='?pagina=" . ($pagina_actual + 1) . "'>Siguiente</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>