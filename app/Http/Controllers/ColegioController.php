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
        $this->middleware('oauth', ['only' => ['create','show', 'update', 'destroy']]);
    }

    public function store(Request $request, $idUsuario)
    {
            if(!$request->input('codigo') || ! $request->input('nombre'))
            {
                return response()->json(['mensaje' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
            }

            Colegio::create
            ([
                'codigo' => $request->input('codigo'),
                'nombre' => $request->input('nombre'),
                'latiud' => $request->input('latiud'),
                'longitud' => $request->input('longitud'),
            ]);

            $colegio = Colegio::where('codigo', '=' , $request->input('codigo'))->first();

            Comentario::create
            ([
                'colegio_id' => $colegio->id,
                'usuario_id' => $idUsuario,
                'calificacion' => $request->input('calificacion'),
                'mensaje' => $request->input('comentario'),
            ]);
            return response()->json(['mensaje' => 'Registro de comentario exitoso'],201);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

}
