<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  // public function handle(Request $request, Closure $next): Response
  // {
  //     return $next($request);
  // }
  public function handle($request, Closure $next)
  {
    try {
      $user = JWTAuth::parseToken()->authenticate();
    } catch (JWTException $e) {
      return response()->json(['error' => 'Token not valid'], 401);
    }

    return $next($request);
  }
}
