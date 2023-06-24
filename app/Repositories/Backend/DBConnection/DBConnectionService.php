<?php

namespace App\Repositories\Backend\DBConnection;

use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use PDO;
use Exception;
use App\Constant\Constant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Vcian\LaravelDBAuditor\Traits\Rules;
use App\Repositories\Backend\BaseService;
use Illuminate\Support\Facades\Schema;

class DBConnectionService extends BaseService
{
    use Rules;

    /**
     * @var string
     */
    public function __construct()
    {
    }

    /**
     * Create the connection of DB and check the table rules
     * 
     * @param object $request
     * @return bool
     */
    public function connect(object $request): bool
    {
        $response = false;
        try {
            DB::purge('mysql'); // Clear any previous dynamic connection

            $config = [
                'driver' => $request->input('connection'),
                // or any other supported driver
                'host' => $request->input('host'),
                'database' => $request->input('db_name'),
                // Replace with your actual database name
                'username' => $request->input('db_username'),
                'password' => $request->input('db_password'),
            ];
            Session::put('dynamic_data', $config);

            DB::connection('mysql')->setPdo(
                new PDO(
                    $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
                    $config['username'],
                    $config['password']
                )
            );

            Config::set('database.connections.dynamic', $config);

            Config::set('database.default', 'dynamic');

            $schemaBuilder = Schema::getConnection()->getSchemaBuilder();
            // Get the table names in the schema
            $tables = $schemaBuilder->getAllTables();
            $tablesAndColumns = '';

            foreach ($tables as $table) {

                $columns = $schemaBuilder->getColumnListing(reset($table));
                $tablesAndColumns .= "Table: " . reset($table) . "<br>";
                $tablesAndColumns .= "Columns:";
                foreach ($columns as $column) {
                    $tablesAndColumns .= "," . $column . "<br>";
                }
                $tablesAndColumns .= "<br>";
            }
            Session::put('dbSchema', $tablesAndColumns);

            $response = true;
        } catch (Exception $ex) {
            Log::info($ex);
        }

        return $response;
    }

    /**
     * Upload the db schema.
     * 
     * @param object $request
     */
    public function upload(object $request)
    {
        try {
            $dbName = strtolower(loggedInUser()->name) . Constant::UNDERSCORE . Constant::DB; //Database name to be created
            // DB::statement("DROP DATABASE $dbName"); //Drops old database

            DB::statement("CREATE DATABASE $dbName"); //Creates new database
            DB::disconnect('dynamic'); //Disconnects current DB
            Config::set('database.connections.dynamic.database', $dbName); //Connects newly created DB
            DB::reconnect();
            $mysqlConn = DB::connection();
            $mysqlConn->getPdo()->exec("USE $dbName;");
            $mysqlConn->setDatabaseName($dbName);

            DB::unprepared(file_get_contents($request->file('file'))); //Creates tables from given schema

            return Constant::STATUS_TRUE;
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }
}