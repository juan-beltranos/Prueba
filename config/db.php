<?php

class Database
{
	public static function connect()
	{
		$db = new mysqli('localhost', 'u940788076_root', 'Prueba123', 'u940788076_prueba');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}
