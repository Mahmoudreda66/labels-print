<?php

namespace Mahmoud\Labels;

use Exception;
use PDO;
use PDOException;

class Database
{
    private string $username,
        $password,
        $name;

    /**
     * @var PDO
     */
    public PDO $connection;

    /**
     * @var bool
     */
    private bool $success = false;

    public function __construct()
    {
        $this->username = env('DB_USERNAME');
        $this->password = env('DB_PASSWORD');
        $this->name = env('DB_NAME');
    }

    public function connect()
    {
        // try to connect if no connection
        if (!$this->success) {
            try {
                $conn = new PDO(
                    "mysql:host=localhost;dbname=" . $this->name,
                    $this->username,
                    $this->password
                );

                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


                $this->connection = $conn;
                $this->success = true;

                return $conn;
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }

        return $this->connection;
    }
}
