<?php if (isset($gestion)) : ?>
	<h1 class="font-weight-bold text-center">Gestionar pedidos</h1>
<?php else : ?>
	<h1>Mis pedidos</h1>
<?php endif; ?>
<br>
<table class="table">
	<thead class="thead-dark">
		<tr>
			<th>Nº Pedido</th>
			<th>Coste</th>
			<th>Fecha</th>
			<th>Estado</th>
		</tr>
	</thead>
	<?php
	while ($ped = $pedidos->fetch_object()) :
	?>

		<tr>
			<td>
				<a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>" class="text-info"><?= $ped->id ?></a>
			</td>
			<td>
				<?= $ped->coste ?> $
			</td>
			<td>
				<?= $ped->fecha ?>
			</td>
			<td>
				<?= Utils::showStatus($ped->estado) ?>
			</td>
		</tr>

	<?php endwhile; ?>
</table>