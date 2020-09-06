<h1 class="font-weight-bold text-center">Algunos de nuestros productos</h1>
<br>

<?php while ($product = $productos->fetch_object()) : ?>
	<div class="product card card-body" style="width: 13rem;">
		<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
			<?php if ($product->imagen != null) : ?>
				<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="card-img-top" />
			<?php else : ?>
				<img src="<?= base_url ?>assets/img/camiseta.png" class="card-img-top" />
			<?php endif; ?>
			<h2 class="text-dark font-weight-bold"><?= $product->nombre ?></h2>
		</a>
		<p><?= $product->precio ?></p>
		<a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="btn btn-danger text-light">Comprar</a>
	</div>
<?php endwhile; ?>