<?php namespace App\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;

class OnceAuth implements Middleware {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function handle($request, Closure $next)
	{
		$fallo = $this->auth->onceBasic();
		if($fallo)
		{
			return response()->json(['mensaje' => 'Se debe estar autenticado para esta petición', 'codigo' => 401],401);
		}
		return $next($request);
	}
}