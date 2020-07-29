<?php

namespace RodrigoXdn\Laravel\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Redirect;

use RodrigoXdn\Laravel\Fecades\FunctionPkg;

class Hash
{

    public function handle($request, Closure $next)
    {	

    	if (Request::isMethod('get')) 
    	{

    		if (Request::is('validate/*')) 
            {
                $current_day = FunctionPkg::format_date();

                $request_day = FunctionPkg::decrypt($request->date);

                $current_format = FunctionPkg::create_format($current_day);

                $request_format = FunctionPkg::create_format($request_day);

                $interval = $current_format->diff($request_format);

                $validate_hours = intval($interval->format('%h'));

                $validate_days = intval($interval->format('%a'));

                if ($validate_days == 0 && $validate_hours <= 10 && $request_day != null) {

                    return Redirect::to(FunctionPkg::decrypt($request->param)."/".FunctionPkg::current_day());
            
                }else{

                    return Redirect::to("/");

                }

            }else if(Request::is('getter/*'))
            {

                $current_day = FunctionPkg::format_date();

                $request_day = FunctionPkg::decrypt($request->date);

                $current_format = FunctionPkg::create_format($current_day);

                $request_format = FunctionPkg::create_format($request_day);

                $interval = $current_format->diff($request_format);

                $validate_hours = intval($interval->format('%h'));

                $validate_days = intval($interval->format('%a'));

                if ($validate_days == 0 && $validate_hours <= 10 && $request_day != null) {

                    return $next($request);
            
                }else{

                    return Redirect::to("/");

                }

            }

    	}else if (Request::isMethod('post')) {

            if (Request::is('setter/*')) 
            {

                $current_day = FunctionPkg::format_date();

                $request_day = FunctionPkg::decrypt($request->date);

                $current_format = FunctionPkg::create_format($current_day);

                $request_format = FunctionPkg::create_format($request_day);

                $interval = $current_format->diff($request_format);

                $validate_hours = intval($interval->format('%h'));

                $validate_days = intval($interval->format('%a'));

                if ($validate_days == 0 && $validate_hours <= 10 && $request_day != null) {

                    return $next($request);
            
                }else{

                    return Redirect::to("/");

                }

            }
            
        }
        
    }

}