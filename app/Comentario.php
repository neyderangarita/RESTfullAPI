<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
	protected $table = 'comentario';
	protected $primaryKey = 'id';
	protected $fillable = array('colegio_id', 'user_id', 'calificacion', 'mensaje');
	protected $hidden = ['created_at', 'updated_at'];
	
	public function colegio()
	{
		return $this->belongsTo('Colegio');
	}

}