
<div class="container p-3">
    <a href="/productos" class="btn btn-primary">
        <i class="fa fa-arrow-left"></i> Volver
    </a>
    <h1>Agregar Producto</h1>

    <?php if($mensaje!=null): ?>
        <div class="error"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <form action="/productos/nuevo" method="POST" enctype="multipart/form-data">
        <div class="form-group my-2">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
        <div class="form-group my-2">
            <label for="categoria">Categoria</label>
            <input type="text" id="categoria" name="categoria" class="form-control" required>
        </div>
        <div class="form-group my-2">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" required>
        </div>
        <div class="form-group my-2">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-control" required accept="image/png, image/jpeg, image/jpg">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fa fa-save"></i> Guardar
            </button>
        </div>
    </form>

</div>
