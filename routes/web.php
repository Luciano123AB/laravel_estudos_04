<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get("/mysql", function() {
    try {
        DB::connection("MyConnection")->getPdo();

        echo "Conexão com a base de dados: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        die("Não foi possível conectar com a base de dados. Erro: " . $e->getMessage());
    }
});

Route::get("/sqlite", function() {
    try {
        DB::connection()->getPdo();

        echo "Conexão com a base de dados: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        die("Não foi possível conectar com a base de dados. Erro: " . $e->getMessage());
    }
});

Route::get("/mysql_test_to_database", function() {
    try {
        //Primeira base de dados:
        DB::connection("mysql_users")->getPdo();
        echo "Sucesso: " . DB::connection("mysql_users")->getDatabaseName();
        echo "<br>";

        //Segunda base de dados:
        DB::connection("mysql_app")->getPdo();
        echo "Sucesso: " . DB::connection("mysql_app")->getDatabaseName();
        echo "<br>";
    } catch (\Exception $e) {
        die("ERRO: " . $e->getMessage());
    }
});

Route::get("/mysql_test_dynamic_connection", function() {
    try {
        Config::set("database.connections.teste", [
            'driver' => 'mysql',
            'url' => '',
            'host' => 'localhost',
            'port' => 3306,
            'database' => 'laravel_mysql_auth',
            'username' => 'root',
            'password' => '24032004ABCD123',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                Pdo\Mysql::ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ]);

        DB::connection("teste")->getPdo();

        echo "Ligação OK!";
    } catch (\Exception $e) {
        echo "Deu erro!";
    }
});