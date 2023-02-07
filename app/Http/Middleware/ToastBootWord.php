<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ToastBootWord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $bootWords = [
            'pencil',
            'eraser'
        ];
        $parameters = $request->all();
        foreach($parameters as $key => $value) {
            if ($key == 'content') {
                foreach($bootWords as $bootWord)
                   if (strpos($value, $bootWord) !== false) {
                       return response('boot', 400);
                   }
            }
        }
        return $next($request);
    }
}
