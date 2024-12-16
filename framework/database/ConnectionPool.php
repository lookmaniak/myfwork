<?php

class ConnectionPool {
    private $pool = [];
    private static $instance = null;

    public static function instance() {
        if(self::$instance === null) {
            self::$instance = new self();    
        }

        return self::$instance;
    }

    public function getConnection() {
        if (count($this->pool) < MAX_CONNECTION) {
            $this->pool[] = $this->createConnection();
        }
        
        return array_pop($this->pool);
    }

    public function releaseConnection($connection) {
        $this->pool[] = $connection; 
    }

    private function createConnection() {
        return new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME , DB_USER, DB_PASSWORD
        );
    }
}
?>
