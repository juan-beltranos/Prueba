<?php if (isset($product)): ?>
	<h1 class="font-weight-bold"><?= $product->nombre ?></h1>
	<div id="detail-product" class="card ">
		<div class="image">
			<?php if ($product->imagen != null): ?>
				<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
			<?php else: ?>
				<img src="<?= base_url ?>assets/img/camiseta.png" />
			<?php endif; ?>
		</div>
		<div class="card-body">
			<p class="description"><?= $product->descripcion ?></p>
			<p class="price"><?= $product->precio ?>$</p>
			<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="btn btn-success text-light">Comprar</a>
		</div>
	</div>
<?php else: ?>
	<h1>El producto no existe</h1>
<?php endif; ?>
