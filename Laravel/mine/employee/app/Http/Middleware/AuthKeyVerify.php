<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
class AuthKeyVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rememberTokenOfUser = $request->header('APP_KEY');
        if($rememberTokenOfUser !='ABCD'){
            return response()->json(["message" => "Unauthorized Request"], 401);
        }
        return $next($request);
    }
}
