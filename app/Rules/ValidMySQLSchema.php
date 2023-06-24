<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class ValidMySQLSchema implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): bool
    {
        // Validate the provided MySQL schema
        try {
            // Create a temporary database connection using the provided schema
            DB::connection()->statement("CREATE DATABASE IF NOT EXISTS `temp_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            DB::purge();

            config([
                'database.connections.temp' => [
                    'driver' => 'mysql',
                    'host' => env('DB_HOST'),
                    'port' => env('DB_PORT'),
                    'database' => 'temp_db',
                    'username' => env('DB_USERNAME'),
                    'password' => env('DB_PASSWORD'),
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'prefix' => '',
                    'strict' => true,
                    'engine' => null,
                ]
            ]);

            // Reconnect to the new temporary database
            DB::reconnect('temp');

            // Execute a simple query to validate the schema
            DB::connection('temp')->select(DB::raw('SELECT 1'));

            // Drop the temporary database
            DB::connection('temp')->statement("DROP DATABASE IF EXISTS `temp_db`");
            DB::purge();

            return true;
        } catch (\Throwable $e) {
            // Validation failed, handle the error if needed
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The provided MySQL schema is invalid.';
    }
}