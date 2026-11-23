<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use App\Models\UsuarioToken;
use App\Models\Admin;
use App\Models\AdminToken;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;


class LogadoadmWebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Cookie::has('token') && Cookie::has('usuario_id')) {
            $usuario_id = Cookie::get('usuario_id');
            $token = Cookie::get('token');
            $token_usuario = UsuarioToken::where('usuario_id', $usuario_id)
                ->where('token', $token)
                ->where('valido_ate', '>', Carbon::now())
                ->first();
            if ($token_usuario) {
                $usuario = Usuario::find($usuario_id);
                $request->usuario = $usuario;
                $admin = Admin::where('usuario_id', $usuario_id)->first();
                if ($admin) {
                    $request->admin = 'S';
                } else {
                    $request->admin = 'N';
                }

                return $next($request);
            } else {
                Cookie::forget('token');
                Cookie::forget('usuario_id');

                return redirect()->route('login_admin');
            }
        } else {
            Cookie::forget('token');
            Cookie::forget('usuario_id');

            return redirect()->route('login_admin');
        }

    }
}
