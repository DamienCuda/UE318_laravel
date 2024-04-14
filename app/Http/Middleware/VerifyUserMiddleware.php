<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerifyUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (!auth()->user()->isVerified) {
                $message = 'Vous aurez accès à toutes les fonctionnalités de l\'appliction dès que l\'administrateur aura validé votre compte. <br/> Merci de votre patience 🙏';
                return redirect()->route('message_redirect', ['message' => $message]);
            }
        }
        return $next($request);
    }
}
