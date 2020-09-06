<?php if (isset($_SESSION['identity'])): ?>
	<h1 class="font-weight-bold text-center">Hacer pedido</h1>
	<p>
		<a href="<?= base_url ?>carrito/index" class="text-info">Ver los productos y el precio del pedido</a>
	</p>
	<br/>
	
<div class="card card-body">
<h3>Dirección para el envio:</h3>
	<form action="<?=base_url.'pedido/add'?>" method="POST">
		<label for="provincia">Provincia</label>
		<input type="text" name="provincia" class="form-control" required />
		
		<label for="ciudad">Ciudad</label>
		<input type="text" name="localidad" class="form-control" required />
		
		<label for="direccion">Dirección</label>
		<input type="text" name="direccion" class="form-control" required />
		
		<input type="submit" value="Confirmar pedido" class="btn btn-danger" />
	</form>
</div>
		
<?php else: ?>
	<h1>Necesitas estar identificado</h1>
	<p>Necesitas estar logueado en la web para poder realizar tu pedido.</p>
<?php endif; ?>


