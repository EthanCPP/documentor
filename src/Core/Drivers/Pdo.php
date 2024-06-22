<?php

namespace Ethancpp\Documentor\Core\Drivers;

class Pdo {

    protected $db;

    public function __construct(
        string $dbname, 
        string $user, 
        string $password, 
        string $host, 
        int    $port, 
        string $adapter
    ) {
        try {
            $this->db = new \PDO("{$adapter}:host={$host};port={$port};dbname={$dbname}", $user, $password);
        } catch (\PDOException $e) {
            // TODO improve this.
            var_dump('Failed to connect to database: ' . $e->getMessage());
            die;
        }
    }

    public function where($query) 
    {
        echo 'Where: ' . $query;
    }
}