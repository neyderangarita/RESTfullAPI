<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('oauth', ['only' => ['show', 'update', 'destroy']]);
    }

    public function store(Request $request)
    {
        if(!$request->input('email') || ! $request->input('password'))
        {
            return response()->json(['mensaje' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        User::create
        ([
            'email' => $request->input('email'),
            'password' => \Hash::make($request->input('password')),
        ]);

        return response()->json(['mensaje' => 'Registro de usuario exitoso'],201);
    }

    public function show($id)
    {
        $usuario = User::find($id);
        if(!$usuario)
        {
            return response()->json(['mensaje' => 'No se encuentra este fabricante', 'codigo' => 404],404);
        }
        return response()->json(['datos' => $usuario],200);
    }

    public function update(Request $request, $id)
    {
        $metodo = $request->method();
        $user = User::find($id);
        if(!$user)
        {
            return response()->json(['mensaje' => 'No se encuentra este usuario', 'codigo' => 404],404);
        }
        if($metodo === 'PATCH')
        {
            $bandera = false;
            $email = $request->input('email');
            if($email != null && $email != '')
            {
                $user->email = $email;
                $bandera = true;
            }
            $password = $request->input('password');
            if($password != null && $password != '')
            {
                $user->password = $password;
                $bandera = true;
            }
            if($bandera)
            {
                $user->save();
                return response()->json(['mensaje' => 'Datos del usuario editados correctamente'],200);
            }
            return response()->json(['mensaje' => 'No se modificó los datos del usuario'],200);
        }
        $email = $request->input('email');
        $password = $request->input('password');
        if(!$email || !$password)
        {
            return response()->json(['mensaje' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return response()->json(['mensaje' => 'Datos del usuario editados correctamente'],200);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return ['deleted' => true];

        $Usuario = User::find($id);
        if(!$Usuario)
        {
            return response()->json(['mensaje' => 'No se encuentra este usuario', 'codigo' => 404],404);
        }
        $Usuario->delete();
        return response()->json(['mensaje' => 'Usuario eliminado'],200);
    }
}
