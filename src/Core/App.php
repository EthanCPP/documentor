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
            $_ENV['DB_NAME'],
            $_ENV['DB_USER'] ?? 'root',
            $_ENV['DB_PASS'] ?? '',
            $_ENV['DB_HOST'] ?? 'localhost',
            $_ENV['DB_PORT'] ?? 3306,
            $_ENV['DB_DRIVER'] ?? 'PDO',
            $_ENV['DB_ADAPTER'] ?? 'mysql'
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