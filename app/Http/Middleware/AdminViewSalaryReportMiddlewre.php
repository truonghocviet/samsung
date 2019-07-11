<?php

namespace App\Http\Middleware;

use Closure;

class AdminViewSalaryReportMiddlewre
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
            if($Code == 'view_salary_report'){$num=1;}
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
