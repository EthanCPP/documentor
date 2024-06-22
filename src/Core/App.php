<?php

namespace Ethancpp\Documentor\Core;

use Dotenv\Dotenv;
use Ethancpp\Documentor\Core\DB;

class App {

    protected $booted = false;

    protected $env;
    protected $db;

    /**
     * Application logic.
     */
    public function boot()
    {
        if ($this->booted) {
            return;
        }

        $this->setupDotenv();
        $this->setupDatabase();

        $this->booted = true;
    }

    protected function setupDotenv()
    {
        $this->env = Dotenv::createImmutable(__DIR__ . '/../../');
        $this->env->load();
    }

    protected function setupDatabase()
    {
        $this->db = new DB(
            $_ENV['MYSQL_DB'],
            $_ENV['MYSQL_USER'] ?? 'root',
            $_ENV['MYSQL_PASS'] ?? '',
            $_ENV['MYSQL_HOST'] ?? 'localhost',
            $_ENV['MYSQL_PORT'] ?? 3306,
            $_ENV['MYSQL_DRIVER'] ?? 'PDO'
        );
    }

    public function db()
    {
        return $this->db;
    }

    /**
     * Singleton logic.
     */
    private static $instance;

    protected function __construct() { }

    public static function getInstance(): App
    {
        if (! self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

}