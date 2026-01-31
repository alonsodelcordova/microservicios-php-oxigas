<div class="container p-3">
    <a href="/productos" class="btn btn-primary">
        <i class="fa fa-arrow-left"></i> Volver
    </a>
    <h1>Agregar Producto</h1>

    <?php if($mensaje!=null): ?>
    <div class="error">
        <?php echo $mensaje; ?>
    </div>
    <?php endif; ?>
</div>




<form action="/productos/nuevo" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <div class="form-section-title">
                        <i class="fa fa-info-circle text-primary"></i>
                        Información General
                    </div>
                    <div class="form-group">
                        <label class="font-weight-600" for="nombre">Nombre del Producto <span
                                class="text-danger">*</span></label>
                        <input class="form-control form-control-lg" id="nombre"
                            placeholder="Ej. Camiseta Algodón Premium" required="" type="text" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-600" for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion"
                            placeholder="Describe las características principales del producto..." rows="4"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-600" for="codigo">SKU / Código <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-barcode"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" id="codigo" placeholder="00-000000" required=""
                                        type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-600" for="categoria">Categoría</label>
                                <select class="form-control" id="categoria">
                                    <option value="" hidden>Seleccionar categoría</option>
                                    <option>Ropa y Accesorios</option>
                                    <option>Electrónica</option>
                                    <option>Hogar</option>
                                    <option>Deportes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="form-section-title">
                        <i class="fa fa-money text-primary"></i>
                        Precios e Inventario
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-600" for="precio">Costo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control" id="precio" placeholder="0.00" step="0.01"
                                        type="number" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-600" for="precioVenta">Precio de Venta</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control" id="precioVenta" placeholder="0.00" step="0.01"
                                        type="number" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-600" for="stock">Stock Inicial</label>
                                <input class="form-control" id="stock" placeholder="0" type="number" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <div class="form-section-title">
                        <i class="fa fa-image text-primary"></i>
                        Multimedia
                    </div>
                    <label class="font-weight-600 mb-2">Imagen del Producto</label>
                    <div class="form-group">
                        <div class="custom-file">
                            <input class="custom-file-input" id="imagen" type="file" />
                            <label class="custom-file-label" for="imagen">Elegir archivo...</label>
                        </div>
                        <small class="form-text text-muted mt-2">PNG, JPG hasta 10MB</small>
                    </div>
                    <div class="border rounded p-2 mt-3 d-flex align-items-center hidden" id="imagenPreviewContainer" >
                        <div class="bg-light mr-3">
                            <img alt="Preview" class="preview-thumbnail" id="imagenPreview"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxVPOv--4LmwN3pftO9Da-wCHkzyJRHX-3sB3zu-Wp9L2dWLs_d0IP2wpb8HGHNx5axAQL9F0hoeANTCO89TxN6cClSRERaGl2KCjqqyrvdQkx_DJ_olip_G1O2CysqBAkevPddaCkRltc9DkPN4I2wYoHSJR4CNYFzDYH_ihW_FIGacbZjMrzNplRFwau1Gwwr9NKQRujtMMYrdzgZfGW2iovPDuznpyP5K4zHqWAH5a6Anv6ZKJeL0MaTmcUnVnU7_LIo7Ld18M5" />
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="text-truncate font-weight-bold small" id="nombreImagen">preview_image_01.jpg</div>
                            <div class="text-muted small" id="sizeImage">1.2 MB</div>
                        </div>
                        <button class="btn btn-sm text-danger" type="button" onclick="clearImage()">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary d-inline-flex align-items-center" type="submit">
            <i class="fa fa-save mr-2"></i> Guardar Producto
        </button>
    </div>
</form>

<script>
    var imagenElement = document.getElementById('imagen');
    var imagenPreviewContainer = document.getElementById('imagenPreviewContainer');
    imagenElement.onchange = function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var imagen = document.getElementById('imagenPreview');
            imagen.src = e.target.result;
            var nombreImagen = document.getElementById('nombreImagen');
            nombreImagen.innerHTML = file.name;
            // al label del input agregar el nombre tambien
            imagenElement.parentNode.querySelector('label').innerHTML = file.name;
            var sizeImage = document.getElementById('sizeImage');
            sizeImage.innerHTML = file.size + ' KB';

            imagenPreviewContainer.classList.remove('hidden');

        }
        reader.readAsDataURL(file);
    }

    function clearImage() {
        var imagen = document.getElementById('imagenPreview');
        imagen.src = '';
        var nombreImagen = document.getElementById('nombreImagen');
        nombreImagen.innerHTML = '';
        imagenPreviewContainer.classList.add('hidden');
        imagenElement.value = '';
        // al label del input borrar el nombre
        imagenElement.parentNode.querySelector('label').innerHTML = 'Elegir archivo...';
    }
    
</script>