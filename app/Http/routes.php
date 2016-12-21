<?php

Route::group(array('prefix' => 'api/colegio'), function()
{
	Route::resource('mail', 'MailController', ['only' => ['store', 'show']]);
	Route::resource('user', 'UserController', ['only' => ['store', 'update', 'destroy', 'show']]);
	Route::resource('colegio', 'ColegioController', ['only' => ['store', 'show']]);
	//Route::resource('vehiculos', 'VehiculoController', ['only' => ['index', 'show']]);
	//Route::resource('fabricantes','FabricanteController', ['except' => ['edit', 'create']]);
	//Route::resource('fabricantes.vehiculos','FabricanteVehiculoController', ['except' => ['show', 'edit', 'create']]);
});	

Route::get('user/{email}', 'UserController@usuario');

Route::post('oauth/access_token', function()
{
    return Response::json(Authorizer::issueAccessToken());
});

Route::pattern('inexistentes', '.*');

Route::any('/{inexistentes}', function()
{
	return response()->json(['mensaje' => 'Ruta o metodos incorrectos.', 'codigo' => 400],400);
});