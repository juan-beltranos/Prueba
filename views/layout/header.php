<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>Prueba</title>
	<link rel="stylesheet" href="<?= base_url ?>assets/css/styles2.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/sandstone/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<body>

	<!-- CABECERA -->
	<nav class="navbar navbar-expand-lg ">
		<div class="container">

			<header>
				<div id="logo">
					<a href="<?= base_url ?>" class="text-danger">
						<i class="fas fa-gamepad "></i> Carrito
					</a>
				</div>
			</header>

			<?php $categorias = Utils::showCategorias(); ?>

			<button class="navbar-toggler btn btn-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon text-light"><i class="fas fa-bars"></i></span>
			</button>

			<div class="collapse navbar-collapse " id="navbarNav">

				<div id="menu " class="ml-auto">
					<ul class="navbar-nav ">
						<li class="nav-item">
							<a href="<?= base_url ?>" class="nav-link">Inicio</a>
						</li>
						<?php while ($cat = $categorias->fetch_object()) : ?>
							<li class="nav-item">
								<a href="<?= base_url ?>categoria/ver&id=<?= $cat->id ?>" class="nav-link"> <?= $cat->nombre ?></a>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>

		</div>
	</nav>

	<div class="container pt-4 bg-light">
		<div class="row">
			<div class="col-md-3">