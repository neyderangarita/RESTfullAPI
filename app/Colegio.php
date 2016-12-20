<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
	protected $table = 'colegio';
	protected $primaryKey = 'id';
	protected $fillable = array('codigo', 'nombre', 'latitud', 'longitud');

	
	protected $hidden = ['created_at', 'updated_at'];

	public function comentarios()
	{
		return $this->hasMany('Comentario');
	}
}