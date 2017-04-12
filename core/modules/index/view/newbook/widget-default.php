<?php

$categories = CategoryData::getAll();
$authors = AuthorData::getAll();
$editorials = EditorialData::getAll();
?>

<div class="row">
<div class="col-md-12">
<h1>Nuevo Producto</h1>
<form class="form-horizontal" role="form" method="post" action="./?action=addbook" id="addbook">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Clave</label>
    <div class="col-lg-4">
      <input type="text" name="isbn" class="form-control" id="inputEmail1" placeholder="Clave">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Color</label>
    <div class="col-lg-4">
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="Color">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Costo</label>
    <div class="col-lg-4">
      <input type="text" name="cost_price" class="form-control" required id="cost_price" placeholder="Precio Costo">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Venta</label>
    <div class="col-lg-4">
      <input type="text" name="cantidad" class="form-control" required id="cantidad" placeholder="Precio de Venta">
    </div>
  </div>


  <div class="form-group">
    
    <div class="col-lg-4">
      
    </div>
   
    <div class="col-lg-4">
      
    </div>

  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-lg-4">
<select name="category_id" class="form-control">
<option value="">-- SELECCIONE --</option>
  <?php foreach($categories as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    
    <div class="col-lg-4">


  <?php foreach($editorials as $p):?>
    
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
   
    <div class="col-lg-4">


  <?php foreach($authors as $p):?>
    
  <?php endforeach; ?>
</select>
    </div>
  </div>






  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-4">
      <button type="submit" class="btn btn-primary">Agregar Producto</button>
      <button type="reset" class="btn btn-default" id="clear">Limpiar Campos</button>
    </div>
  </div>
</form>

</div>
</div>
