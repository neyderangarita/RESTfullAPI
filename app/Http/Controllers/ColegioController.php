<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Colegio;
use App\Comentario;


class ColegioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('oauth', ['only' => ['store']]);
    }
    

    public function store(Request $request)
    {
            if(!$request->input('codigo') || ! $request->input('nombre'))
            {
                return response()->json(['mensaje' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
            }

            Colegio::create
            ([
                'codigo' => $request->input('codigo'),
                'nombre' => $request->input('nombre'),
                'latitud' => $request->input('latitud'),
                'longitud' => $request->input('longitud'),
            ]);

            $colegio = Colegio::where('codigo', '=' , $request->input('codigo'))->first();
            
            Comentario::create
            ([
                'colegio_id' => $colegio->id,
                'user_id' => $request->input('user_id'),
                'calificacion' => $request->input('calificacion'),
                'mensaje' => $request->input('comentario'),
            ]);
            
            return response()->json(['mensaje' => 'Registro de comentario exitoso'],201);
    }

}
