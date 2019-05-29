<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class SecretAccess
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
        $secretsValid = explode(',', env('ACCEPTED_SECRETS'));

        // check the secret code from incomming request
        if (in_array($request->header('Authorization'), $secretsValid)) {
            return $next($request);
        }

        abort(Response::HTTP_UNAUTHORIZED);
    }
}
