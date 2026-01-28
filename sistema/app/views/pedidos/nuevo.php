


<div class="mb-4 border-bottom">
    <div class="mb-2">
        <a href="/pedidos" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Volver
        </a>
    </div>
    <div>
        <h1 class="h2 font-weight-bold">Entradas al Almacén</h1>
        <p class="text-muted">Registrar nueva entrada de mercancía al inventario central</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 my-2">
        <div class="card my-2">
            <div class="card-header">
                Información del Proveedor
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-lg-5 col-sm-6">
                        <label class="small font-weight-bold">Proveedor</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" placeholder="" type="text" />
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-sm-6">
                        <label class="small font-weight-bold">Número de Factura</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-file"></i>
                                </span>
                            </div>
                            <input class="form-control" placeholder="FAC-12345" type="text" />
                        </div>
                    </div>
                    <div class="form-group col-lg-3 col-sm-6">
                        <label class="small font-weight-bold">Fecha</label>
                        <input class="form-control" type="date" value="2023-10-27" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Detalle de Productos</span>
                <button class="btn btn-primary btn-sm" 
                    data-target="#addUserModal" data-toggle="modal"
                    onclick="openModalAddProducts()"
                >
                    <i class="fa fa-cart-plus"></i> Añadir
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="tablaProductos">
                    <thead>
                        <tr>
                            <th style="width: 40%">Producto / SKU</th>
                            <th style="width: 20%">Cantidad</th>
                            <th style="width: 20%">Costo Unit.</th>
                            <th style="width: 15%">Subtotal</th>
                            <th style="width: 5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" value="1" name="id" hidden />
                                <input type="text"  value="Monitor UltraWide 34' Samsung" 
                                    readonly class="form-control form-control-sm border-0 bg-transparent p-0 font-weight-bold"
                                />
                                <div class="sku-text text-uppercase">SKU: SM-34UW-102</div>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <input class="form-control" type="number" value="10" />
                                </div>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">S/.</span>
                                    </div>
                                    <input class="form-control" type="number" value="450.00" />
                                </div>
                            </td>
                            <td class="align-middle font-weight-bold">$4,500.00</td>
                            <td class="align-middle text-center">
                                <button class="btn btn-link text-danger p-0">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4 my-2">
        <div class="card">
            <div class="card-header">
                Resumen de Entrada
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="small font-weight-bold">Notas Adicionales</label>
                    <textarea class="form-control form-control-sm" placeholder="Observaciones sobre la recepción..."
                        rows="3"></textarea>
                </div>
                <hr />
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Subtotal</span>
                    <span class="font-weight-bold">$6,625.00</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">IVA (16%)</span>
                    <span class="font-weight-bold">$1,060.00</span>
                </div>
                <div class="d-flex justify-content-between align-items-end border-top pt-3 mb-4">
                    <span class="small font-weight-bold text-uppercase">Total General</span>
                    <span class="total-value">$7,685.00</span>
                </div>
                <button class="btn btn-primary btn-lg btn-block mb-2">
                    Confirmar Entrada
                </button>
                <a class="btn btn-link btn-block text-muted btn-sm" href="/pedidos">
                    Cancelar Operación
                </a>
            </div>
        </div>
        <div class="alert alert-info border-0 shadow-sm small mt-3">
            <div class="d-flex gap-2">
                <i class="fa fa-info-circle h1"></i>
                <div>
                    Asegúrese de que los costos unitarios coincidan con la factura física para mantener la
                    precisión del inventario.
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


<script >

    function openModalAddProducts(){
    }

</script>