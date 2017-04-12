<?php
$book = BookData::getById($_GET["id"]);
$categories = CategoryData::getAll();
$authors = AuthorData::getAll();
$editorials = EditorialData::getAll();

?>

<div class="row">
<div class="col-md-12">
<h1><?php echo $book->isbn; ?> <small>Editar</small></h1>
<form class="form-horizontal" role="form" method="post" action="./?action=updatebook" id="addbook">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Clave</label>
    <div class="col-lg-4">
      <input type="text" name="isbn" class="form-control" value="<?php echo $book->isbn; ?>" id="inputEmail1" placeholder="Clave">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Color</label>
    <div class="col-lg-4">
      <input type="text" name="title" required class="form-control" value="<?php echo $book->title; ?>" id="inputEmail1" placeholder="Color">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio Costo</label>
    <div class="col-lg-4">
      <input type="text" name="cost_price" class="form-control" required id="cost_price" placeholder="Precio de Costo" value="<?php echo $book->precio_costo; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Venta</label>
    <div class="col-lg-4">
      <input type="text" name="cantidad" class="form-control" required value="<?php echo $book->cantidad; ?>" id="cantidad" placeholder="Precio de Venta">
    </div>
  </div>
  <div class="form-group">

    <div class="col-lg-4">
   
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
    <option value="<?php echo $p->id; ?>" <?php if($book->category_id!=null && $book->category_id==$p->id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    
    


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
    <input type="hidden" name="id" value="<?php echo $book->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Libro</button>
      <button type="reset" class="btn btn-default" id="clear">Limpiar Campos</button>
    </div>
  </div>
</form>

</div>
</div>
