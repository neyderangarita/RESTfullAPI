<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Mail;

class MailController extends Controller
{

    public function store(Request $request)
    {         
        if(!$request->input('email'))
        {
            return response()->json(['mensaje' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        

        $aleatoria = \Hash::make(str_random(4));

        $user = User::where('email', '=' , $request->input('email'))->first();
        $email = $request->input('email');
        $password = bcrypt($aleatoria);       
        $user->email = $email;
        $user->password = $password;
        $user->save();
        // ENVIAR CORREO 
        $data=['hashed_random_password'=> $aleatoria];

        Mail::send(['text'=>'mail'], $data, function($message) use ($email){

            $message->to($email,'Usuario cupo colegio')->subject('Restauración de contraseña');
            
        });

        return response()->json(['mensaje' => 'Datos del usuario editados correctamente'],200);
    }


    public function show($id)
    {

    echo "string".$id;

    }


}