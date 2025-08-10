<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckModuleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $moduleName
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $moduleName)
    {
        $user = Auth::user();

        // Check if user is authenticated and has the module assigned
        if ($user && $user->modules()->where('name', $moduleName)->exists()) {
            return $next($request);
        }

        // Otherwise, deny access or redirect to 'no access' page or dashboard
        return redirect()->route('admin.dashboard')->with('error', 'You do not have access to this module.');
    }
}
