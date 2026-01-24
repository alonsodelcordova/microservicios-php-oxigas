
<div class="container p-3">

    <a href="/clientes" class="btn btn-primary mb-2">
        <i class="fa fa-arrow-left"></i> Volver
    </a>
    <h2>Crear Cliente</h2>

    

    <form action="/clientes/registrar" method="POST">
        <div class="form-group my-2">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
        <div class="form-group my-2">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido"  class="form-control" required>
        </div>
        <div class="form-group my-2">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group my-2">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fa fa-save"></i> Guardar
            </button>
        </div>
        
    </form>
</div>
    

