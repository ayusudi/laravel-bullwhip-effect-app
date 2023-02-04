<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionNamaBagian 
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
        $id_bagian = $request->session()->get('id_bagian', 'default');
        $path = $request->path();
        if ($id_bagian !== 'default'){
            if ( $id_bagian === 7 && $request->is('admin/*')) {
                return $next($request);
            } else if ($id_bagian === 8 && str_contains( $path, 'bullwhip')){
                return $next($request);
            } else if ( $id_bagian === 9 && str_contains( $path, 'gudang')){
                return $next($request);
            } else if ($id_bagian === 10 && str_contains( $path, 'pemesanan')){
                return $next($request);
            } else if ( $id_bagian === 11 && str_contains( $path, 'produksi')){
                return $next($request);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
    }
}
