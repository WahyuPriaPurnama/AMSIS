<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @param  string|null  ...$guards
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle($request, Closure $next, $guard = null)
  {
    if (Auth::guard($guard)->check()) {
      $role = Auth::user()->role;

      switch ($role) {
        case 'admin':
          return redirect('/admin_dashboard');
          break;
        case 'marketing':
          return redirect('/marketing_dashboard');
          break;
        case 'hrd':
          return redirect('/hrd_dashboard');
          break;
        case 'gudang':
          return redirect('/gudang_dashboard');
          break;
        case 'direksi':
          return redirect('/direksi_dashboard');
          break;
        case 'accounting':
          return redirect('/accounting_dashboard');
          break;
        case 'pengadaan':
          return redirect('/pengadaan_dashboard');
          break;

        default:
          return redirect('/home');
          break;
      }
    }
    return $next($request);
  }
}
