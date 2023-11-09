<h1 class="page-header">
    <?php echo $alm->Idproducto != null ? $alm->caducidad : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Persona">Productos</a></li>
  <li class="active"><?php echo $alm->Idproducto != null ? $alm->caducidad : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Persona&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="Idproducto" value="<?php echo $alm->Idproducto; ?>" />
    
    <div class="form-group">
        <label>Caducidad</label>
        <input type="date" name="caducidad" value="<?php echo $alm->caducidad; ?>" class="form-control" placeholder="Ingrese su nombre y Apellido" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Precio del producto</label>
        <input type="text" name="precio" value="<?php echo $alm->precio; ?>" class="form-control" 
        placeholder="Ingrese el precio" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Tamaño del producto</label>
        <input type="text" name="tamano" value="<?php echo $alm->tamano; ?>" class="form-control" 
        placeholder="Ingrese el precio del producto" data-validacion-tipo="requerido|min:5" />
    </div>
    
    <div class="form-group">
        <label>Promocion del producto</label>
        <input type="text" name="promocion" value="<?php echo $alm->promocion; ?>" class="form-control" 
        placeholder="Ingrese si su producto cuenta con promocion" data-validacion-tipo="requerido|min:8" />
    </div>
    
    <div class="form-group">
        <label>Distribuidora del producto</label>
        <input type="text" name="distribuidora" value="<?php echo $alm->distribuidora; ?>" class="form-control"
         placeholder="Ingrese la distribuidora del producto" data-validacion-tipo="requerido|min:5" />
    </div>

    <div class="form-group">
        <label>id de la sucursal</label>
        <input type="text" name="idSucursal" value="<?php echo $alm->idSucursal; ?>" class="form-control"
         placeholder="Ingrese el id de la sucursal" data-validacion-tipo="requerido|min:5" />
    </div>

    <div class="form-group">
        <label>Nombre del producto</label>
        <input type="text" name="nombreProduc" value="<?php echo $alm->nombreProduc; ?>" class="form-control"
         placeholder="Ingrese el id de la sucursal" data-validacion-tipo="requerido|min:5" />
    </div>

    
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
