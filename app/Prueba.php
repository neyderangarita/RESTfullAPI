<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Prueba extends Model 
{
	public function Saludar($nombre)
	{
		return "hola $nombre";
	}
}
