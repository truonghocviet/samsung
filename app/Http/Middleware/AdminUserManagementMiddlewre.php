<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminUserManagementMiddlewre
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

       $User = Auth::user();
       $CodeGroup = json_decode($User->group_user->code_group,true);
       $num = 0;
       foreach ($CodeGroup as $Code) {
           if($Code == 'user_management'){$num=1;}
       }
       if($num == 1)
       {
           return $next($request);
       }
       else
       {
            return redirect('Login');
       }

   }
}
