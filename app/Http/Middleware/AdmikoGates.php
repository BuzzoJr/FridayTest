<?php
/** Gate restrictions. Developer always has full access to all pages. **/

namespace App\Http\Middleware;
use App\Models\Admin\Admins\AdminRoles;
use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class AdmikoGates
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if ($user && $user->getTable() == 'admins') {
            if ($user->role_id == 1) {
                /**Developer always has full access to all pages**/
                Gate::after(function () {
                    return true;
                });
            }
            $permissionsAll = AdminRoles::with('permission_list')->find($user->role_id);
            foreach ($permissionsAll->permission_list as $permissions) {
                Gate::define($permissions->pivot->permission, function () {
                    return true;
                });
            }
        }
        return $next($request);
    }
}
