<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserSubscriptionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = config('model-variables.models.user.class')::where('email', $request['email'])
                ->with('subscriptions')
                ->first();
        
        if (!empty($user->subscriptions) && ($user->subscriptions->usage <= $user->subscriptions->limit)) {
            return $next($request);
        }

        return redirect()->back()->with('flash_error', trans('auth.subscription_expired'));
    }
}
