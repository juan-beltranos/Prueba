<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
	<h1>Editar producto <?=$pro->nombre?></h1>
	<?php $url_action = base_url."producto/save&id=".$pro->id; ?>
	
<?php else: ?>
	<h1 class="font-weight-bold text-center">Crear nuevo producto</h1>
	<?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>
<br>
<div class=" col-md-6 card card-body">
	
	<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" class="form-control" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"/>

		<label for="descripcion">Descripción</label>
		<textarea name="descripcion"  class="form-control"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

		<label for="precio">Precio</label>
		<input type="text" name="precio"  class="form-control" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>"/>

		<label for="categoria">Categoria</label>
		<?php $categorias = Utils::showCategorias(); ?>
		<select name="categoria"  class="form-control">
			<?php while ($cat = $categorias->fetch_object()): ?>
				<option value="<?= $cat->id ?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
					<?= $cat->nombre ?>
				</option>
			<?php endwhile; ?>
		</select>
		
		<label for="imagen">Imagen</label>
		<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
			<img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb"/> 
		<?php endif; ?>
		<input type="file" name="imagen"  class="form-control form-group" />
		
		<input type="submit" value="Guardar" class="btn btn-success" />
	</form>
	
</div>
<br>