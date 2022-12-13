<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">CODIGO</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" name="CODIGO" placeholder="CODIGO" id="example-text-input" require value="<?php echo $producto->CODIGO; ?>">
    </div>
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" name="NOMBRE" placeholder="Dijite el nombre del cliente" id="example-search-input" require value="<?php echo $producto->NOMBRE; ?>">
    </div>
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">CATEGORIA</label>
    <div class="col-sm-10">
        <input class="form-control" type="Text" name="CATEGORIA" placeholder="Dijite La Categoria" id="" require value="<?php echo $producto->CATEGORIA; ?>">
    </div>
</div>
<div class="form-group row">
    <label for="example-url-input" class="col-sm-2 col-form-label">PRECIO1</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" name="PRECIO1" placeholder="PRECIO1" id="example-url-input" require value="<?php echo $producto->PRECIO1; ?>">
    </div>
</div>
<div class="form-group row">
    <label for="example-tel-input" class="col-sm-2 col-form-label">PRECIO2</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" name="PRECIO2" placeholder="PRECIO2" id="example-tel-input" require value="<?php echo $producto->PRECIO2; ?>">
    </div>
</div>
<div class="form-group row">
    <label for="example-password-input" class="col-sm-2 col-form-label">PROVEEDOR</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" name="PROVEEDOR" placeholder="PROVEEDOR" id="example-password-input" require value="<?php echo $producto->PROVEEDOR; ?>">
        <input type="hidden" name="id" value=" <?php echo $producto->ID; ?>">
    </div>
</div>