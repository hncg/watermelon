<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Response;
class OldMiddleware
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
        $user = Route::input('user_id');
        if (empty($user)) {
            return Response::json(array('message' => 'Resource Not Found'), 403);
        }
        return $next($request);
    }
}
