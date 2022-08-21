<?php

namespace App\Http\Middleware;

use Closure;

class PermisoApp
{
    private $authorization = 'esmiaplicacionmaestra';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {		
        $auth = $request->header('Auth');
        if($auth != $this->authorization ){
            return response()->json(array(
                'status' => 'error',
                'code' => 401,
                'message' => 'No autorizado para usar la aplicación. Solicite al dueño del serivicio web su token!!!'
            ));
        }
        
        return $next($request);
    }
}
