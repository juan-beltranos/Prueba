<?php if (isset($categoria)) : ?>
	<h1 class="text-center"><?= $categoria->nombre ?></h1>
	<br>
	<?php if ($productos->num_rows == 0) : ?>
		<p>No hay productos para mostrar</p>
	<?php else : ?>

		<?php while ($product = $productos->fetch_object()) : ?>

			<div class="product card card-body" style="width: 15rem;">
				<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
					<?php if ($product->imagen != null) : ?>
						<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="card-img-top" />
					<?php else : ?>
						<img src="<?= base_url ?>assets/img/camiseta.png" class="card-img-top" />
					<?php endif; ?>
					<h2 class="text-info"><?= $product->nombre ?></h2>
				</a>
				<p><?= $product->precio ?></p>
				<a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="btn btn-danger text-light">Comprar</a>
			</div>

		<?php endwhile; ?>

	<?php endif; ?>
<?php else : ?>
	<h1>La categoría no existe</h1>
<?php endif; ?>