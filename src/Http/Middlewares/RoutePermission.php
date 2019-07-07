<?php

namespace najmulcse\laraplusadmin\Http\Middlewares;

use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;

class RoutePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (app('auth')->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        if (app('auth')->user()->hasPermission($permission)) {
            return $next($request);
        }

        $permissions = is_array($permission)
            ? $permission
            : explode(',', $permission);


        throw UnauthorizedException::forPermissions($permissions);
    }
}
