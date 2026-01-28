
<div class="row">
    <div class="col-lg-12">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 font-weight-bold mb-0">Gestión de Usuarios</h1>
                <p class="text-muted mb-0">Administre el acceso del personal y configure sus niveles de permiso.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <button class="btn btn-primary shadow-sm d-inline-flex align-items-center"
                    data-target="#addUserModal" data-toggle="modal">
                    <i class="fa fa-plus"></i> Añadir
                </button>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted small font-weight-bold text-uppercase">Usuarios Totales</span>
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <h2 class="font-weight-bold mt-2 mb-0">142</h2>
                        <small class="text-success font-weight-bold">+4 este mes</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted small font-weight-bold text-uppercase">Sesiones Activas</span>
                            <i class="fa fa-bolt text-info"></i>
                        </div>
                        <h2 class="font-weight-bold mt-2 mb-0">28</h2>
                        <small class="text-muted">En tiempo real</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted small font-weight-bold text-uppercase">Alertas</span>
                            <i class="fa fa-warning text-warning"></i>
                        </div>
                        <h2 class="font-weight-bold mt-2 mb-0">2</h2>
                        <small class="text-warning">Requieren revisión</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs card-header-tabs border-bottom-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Lista de Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Auditoría</a>
                    </li>
                </ul>
                <div class="btn-group">
                    <button class="btn btn-sm btn-light border dropdown-toggle" data-toggle="dropdown"
                        type="button">
                        <i class="fa fa-filter"></i>
                        Filtrar
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="pl-4">Usuario</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Último Login</th>
                            <th class="text-right pr-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($resultado as $row): ?>
                            <tr>
                                <td class="pl-4 align-middle">
                                    <div class="d-flex align-items-center">
                                        <img alt="User" class="user-avatar mr-3"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXJ12R6jDjm6vcR-C2GUx6nl0jTYpdKCOeJE8OoBc5exyBj3XmZk2fOwV-IUxJQ9Y98XAKH0k8dDhPC9u2DMzzV7NCEg02pW28vdMAk4ohZGZwK5GXqoa6aHkc84a1aq62o1s63l2K5xCttDCPjYhuneohPxbDL8DZjg2c0f1EjvUIUtD3Gn55EQj03erUOeXjWu0OjV7jvG_aZHBtYil0Ncp_La1BBBKeQnz1jkxGa6xP2U6trocM-X01FxaogfDDUbTp9DYrsVeo" 
                                            width="100" height="100"
                                            />
                                        <div>
                                            <div class="font-weight-bold text-dark"><?= $row['nombre'] ?></div> 
                                            <div class="small text-muted"><?= $row['email'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <span class="badge badge-pill badge-primary">
                                        USER
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <span class="status-indicator bg-success"></span>
                                    <small class="font-weight-bold text-success">Activo</small>
                                </td>
                                <td class="align-middle text-muted small">Hace 12 minutos</td>
                                <td class="text-right pr-4 align-middle">
                                    <button class="btn btn-sm btn-light" data-target="#editPermissionsModal"
                                        data-toggle="modal" title="Editar Permisos">
                                        <i class="fa fa-shield"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light" title="Editar">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light text-danger" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold d-flex align-items-center">
                            <i class="fa fa-key text-primary"></i>
                            Matriz de Seguridad
                        </h5>
                        <p class="small text-muted">Permisos rápidos asignados actualmente por rol.</p>
                        <div class="list-group list-group-flush mt-3">
                            <div class="list-group-item px-0 border-top-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-0 font-weight-bold">Autorizar Devoluciones</p>
                                        <small class="text-muted">Validar reembolsos en caja</small>
                                    </div>
                                    <div>
                                        <span class="badge badge-primary">ADM</span>
                                        <span class="badge badge-light border">GER</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item px-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-0 font-weight-bold">Ver Reportes Financieros</p>
                                        <small class="text-muted">Balances y cierres de mes</small>
                                    </div>
                                    <div>
                                        <span class="badge badge-primary">ADM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item px-0 border-bottom-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-0 font-weight-bold">Gestión de Inventario</p>
                                        <small class="text-muted">Modificar stock y precios</small>
                                    </div>
                                    <div>
                                        <span class="badge badge-primary">ADM</span>
                                        <span class="badge badge-primary">GER</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-light btn-block mt-3 border">Configurar Matriz Completa</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-dark text-white border-0 shadow-lg overflow-hidden position-relative">
                    <div class="card-body p-4 position-relative" style="z-index: 2;">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-shield text-success mr-2"></i>
                            <h5 class="mb-0 font-weight-bold">Seguridad Nivel Alto</h5>
                        </div>
                        <p class="text-white-50">Las políticas de seguridad se encuentran activas y actualizadas.
                            Última auditoría sin incidencias.</p>
                        <div class="mt-4">
                            <div class="d-flex justify-content-between small mb-1">
                                <span class="font-weight-bold">ESTADO DE AUDITORÍA</span>
                                <span>98%</span>
                            </div>
                            <div class="progress bg-secondary" style="height: 6px;">
                                <div class="progress-bar bg-primary" style="width: 98%;"></div>
                            </div>
                        </div>
                        <div class="mt-5 d-flex gap-3">
                            <button class="btn btn-outline-light btn-sm mr-2">Descargar Reporte</button>
                            <button class="btn btn-link btn-sm text-primary p-0">Reiniciar Sesiones</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Añadir Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" type="button">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="font-weight-bold">Nombre Completo</label>
                        <input class="form-control" placeholder="Ej: Juan Pérez" type="text" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Email Institucional</label>
                        <input class="form-control" placeholder="juan.perez@empresa.com" type="email" />
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Rol</label>
                            <select class="form-control">
                                <option>Cajero</option>
                                <option>Gerente</option>
                                <option>Administrador</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Sucursal</label>
                            <select class="form-control">
                                <option>Matriz</option>
                                <option>Norte</option>
                                <option>Sur</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal" type="button">Cancelar</button>
                <button class="btn btn-primary" type="button">Guardar Usuario</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="editPermissionsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-light">
                <h5 class="modal-title font-weight-bold d-flex align-items-center">
                    <span class="material-symbols-outlined mr-2 text-primary">security</span>
                    Permisos de Usuario: Alejandro García
                </h5>
                <button class="close" data-dismiss="modal" type="button">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-muted small mb-4">Ajuste los privilegios específicos para este usuario independientemente
                    de su rol base.</p>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold mb-3">Ventas y Caja</h6>
                        <div class="custom-control custom-switch mb-3">
                            <input checked="" class="custom-control-input" id="perm1" type="checkbox" />
                            <label class="custom-control-label" for="perm1">Realizar Ventas</label>
                        </div>
                        <div class="custom-control custom-switch mb-3">
                            <input checked="" class="custom-control-input" id="perm2" type="checkbox" />
                            <label class="custom-control-label" for="perm2">Aplicar Descuentos</label>
                        </div>
                        <div class="custom-control custom-switch mb-3">
                            <input class="custom-control-input" id="perm3" type="checkbox" />
                            <label class="custom-control-label" for="perm3">Anular Facturas</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold mb-3">Inventario y Admin</h6>
                        <div class="custom-control custom-switch mb-3">
                            <input checked="" class="custom-control-input" id="perm4" type="checkbox" />
                            <label class="custom-control-label" for="perm4">Ver Stock</label>
                        </div>
                        <div class="custom-control custom-switch mb-3">
                            <input class="custom-control-input" id="perm5" type="checkbox" />
                            <label class="custom-control-label" for="perm5">Modificar Precios</label>
                        </div>
                        <div class="custom-control custom-switch mb-3">
                            <input class="custom-control-input" id="perm6" type="checkbox" />
                            <label class="custom-control-label" for="perm6">Acceso a Reportes</label>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="font-weight-bold">Restricción de Horario</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><span
                                    class="material-symbols-outlined">schedule</span></span>
                        </div>
                        <input class="form-control" placeholder="08:00 - 18:00" type="text" value="08:00 - 20:00" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary" data-dismiss="modal" type="button">Descartar</button>
                <button class="btn btn-primary" type="button">Actualizar Permisos</button>
            </div>
        </div>
    </div>
</div>