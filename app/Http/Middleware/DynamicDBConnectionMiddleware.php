<?php

namespace App\Http\Middleware;

use PDO;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class DynamicDBConnectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = Session::get('DBRequest');
        
        if (!empty($data)) {
            // Set the dynamic database connection
            Config::set('database.default', 'dynamic');
            Config::set('database.connections.dynamic', [
                'driver' => 'mysql',
                'host' => $data['host'],
                'port' => $data['port'],
                'database' => $data['db_name'],
                'username' => $data['db_username'],
                'password' => $data['db_password'],
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => true,
                'engine' => null,
            ]);
             
            // Reconnect to the database
            DB::purge();
            DB::reconnect();
        }
 
        return $next($request);
    }
}
