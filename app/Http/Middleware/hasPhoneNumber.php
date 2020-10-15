<?php

namespace App\Http\Middleware;

use Closure;

class hasPhoneNumber
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
        if (! $request->user()->hasPhoneNumber()) {
            return redirect()->route('sms.index');
        }

        return $next($request);
    }
}
