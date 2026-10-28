<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\usuario;
use App\Models\UsuarioToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class LoginApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has("token") && $request-> has('usuario_id')) { 
            $token = UsuarioToken::where('usuario_id', $request->usuario_id)->where('token', $request->token)->where('valido_ate', '>', Carbon::now())->first();
            if($token) {
                return $next($request);
            }
            return response()->json(['message'=>'Token expirado ou invalido :(', 'erro'=> 's'], 200);
        }else{
            return response()->json(['message'=>'Token não recebido :(', 'erro' => 's'], 200);
        } 
    }
}