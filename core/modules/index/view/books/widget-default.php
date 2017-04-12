<?php 
?>
<div class="row">
	<div class="col-md-12">
          <a href="index.php?view=newbook" class="btn btn-default pull-right"><i class="fa fa-book"></i> Nuevo Producto</a>

		<h1>Lista de Productos</h1>


		<?php
		$books = BookData::getAll();
		if(count($books)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Clave</th>
			<th>Color</th><?/*
			<th>Talla</th>
			<th>Ejemplares</th>
			<th>Disponibles</th>*/?>
			<th>Precio</th>
			<th>Categoria</th>
			<th></th>
			</thead>
			<?php
			foreach($books as $user){
				$category  = $user->getCategory();
				?>
				<tr>
				<td><?php echo $user->isbn; ?></td>
				<td><?php echo $user->title; ?></td>
				<td><?php echo $user->cantidad; ?></td><?/*
				<td><?php echo ItemData::countByBookId($user->id)->c; ?></td>
				<td><?php echo ItemData::countAvaiableByBookId($user->id)->c; ?></td>*
				<td><?php echo '$' . $user->cantidad; ?></td>*/?>
				<td><?php if($category!=null){ echo $category->name; }  ?></td>
				<td style="width:210px;">
					<?/*<a href="index.php?view=items&id=<?php echo $user->id;?>" class="btn btn-default btn-xs">Ejemplares</a>*/?>
					<a href="index.php?view=editbook&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
					<a href="index.php?action=delbook&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}


				?>
				</table>
				<?php

		}else{
			echo "<p class='alert alert-danger'>No hay Productos.</p>";
		}


		?>


	</div>
</div>