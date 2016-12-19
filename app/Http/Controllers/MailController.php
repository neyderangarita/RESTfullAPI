<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Mail;

class MailController extends Controller
{

    public function show($mail)
    {
        $aleatoria = \Hash::make(str_random(4));
        $data=['hashed_random_password'=> $aleatoria];

        Mail::send(['text'=>'mail'], $data, function($message) use ($mail){
            $message->to($mail,'Usuario cupo colegio')->subject('Restauración de contraseña');
            $message->from('cupocolegio2017@gmail.com','Administrador cupo colegio');
        });

        if(!$mail)
        {
            return response()->json(['mensaje' => 'No se encuentra este fabricante', 'codigo' => 404],404);
        }

        return response()->json(['datos' => 'Email ha sido enviado'],200);
    }
}