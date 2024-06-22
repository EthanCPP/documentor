<?php

namespace Ethancpp\Documentor\Core;

use Ethancpp\Documentor\Core\Drivers\Pdo;

class DB {

    protected $driver = 'PDO';
    protected $db;

    public function __construct(
        string     $dbname,
        string     $user     = 'root',
        string     $password = '',
        string     $host     = 'localhost',
        int|string $port     = 3306,
        string     $driver   = 'PDO'
    ) {
        $this->driver = $driver;

        if ($driver == 'PDO') {
            $this->db = new Pdo($dbname, $user, $password, $host, (int) $port);
        }
    }

    public function getDriver(): int
    {
        return $this->driver;
    }

    public function where($query)
    {
        return $this->db->where($query);
    }

}