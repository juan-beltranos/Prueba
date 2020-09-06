<?php

class Producto
{
	private $id;
	private $categoria_id;
	private $nombre;
	private $descripcion;
	private $precio;
	private $fecha;
	private $imagen;

	private $db;

	public function __construct()
	{
		$this->db = Database::connect();
	}

	function getId()
	{
		return $this->id;
	}

	function getCategoria_id()
	{
		return $this->categoria_id;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function getDescripcion()
	{
		return $this->descripcion;
	}

	function getPrecio()
	{
		return $this->precio;
	}

	function getOferta()
	{
		return $this->oferta;
	}

	function getFecha()
	{
		return $this->fecha;
	}

	function getImagen()
	{
		return $this->imagen;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setCategoria_id($categoria_id)
	{
		$this->categoria_id = $categoria_id;
	}

	function setNombre($nombre)
	{
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setDescripcion($descripcion)
	{
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function setPrecio($precio)
	{
		$this->precio = $this->db->real_escape_string($precio);
	}



	function setOferta($oferta)
	{
		$this->oferta = $this->db->real_escape_string($oferta);
	}

	function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	function setImagen($imagen)
	{
		$this->imagen = $imagen;
	}

	public function getAll()
	{
		$productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
		return $productos;
	}

	public function getAllCategory()
	{
		$sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
			. "INNER JOIN categorias c ON c.id = p.categoria_id "
			. "WHERE p.categoria_id = {$this->getCategoria_id()} "
			. "ORDER BY id DESC";
		$productos = $this->db->query($sql);
		return $productos;
	}

	public function getRandom($limit)
	{
		$productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
		return $productos;
	}

	public function getOne()
	{
		$producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}

	public function save()
	{
		$sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, null, CURDATE(), '{$this->getImagen()}');";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function edit()
	{
		$sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()},categoria_id={$this->getCategoria_id()}  ";

		if ($this->getImagen() != null) {
			$sql .= ", imagen='{$this->getImagen()}'";
		}

		$sql .= " WHERE id={$this->id};";


		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function delete()
	{
		$sql = "DELETE FROM productos WHERE id={$this->id}";
		$delete = $this->db->query($sql);

		$result = false;
		if ($delete) {
			$result = true;
		}
		return $result;
	}
}
function conseguirEntradas($conexion, $limit = null, $categoria = null, $busqueda = null)
{
	$sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
		"INNER JOIN categorias c ON e.categoria_id = c.id ";

	if (!empty($categoria)) {
		$sql .= "WHERE e.categoria_id = $categoria ";
	}

	if (!empty($busqueda)) {
		$sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
	}

	$sql .= "ORDER BY e.id DESC ";

	if ($limit) {
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 4";
	}

	$entradas = mysqli_query($conexion, $sql);

	$resultado = array();
	if ($entradas && mysqli_num_rows($entradas) >= 1) {
		$resultado = $entradas;
	}

	return $entradas;
}
