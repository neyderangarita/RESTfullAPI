<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehiculo;

class VehiculoController extends Controller {
	
	public function index()
	{
		return response()->json(['datos' => Vehiculo::all()],200);
	}

	public function show($id)
	{
		$vehiculo = Vehiculo::find($id);	
		if(!$vehiculo)
		{
			return response()->json(['mensaje' => 'No se encuentra este vehiculo', 'codigo' => 404],404);
		}
		return response()->json(['datos' => $vehiculo],200);
	}
}