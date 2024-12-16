<?php

require locate('/framework/database/ConnectionPool.php');
require locate('/framework/helpers/string_literals.php');

class Model {

    private static function get_base_table() {
        $class_name = get_called_class();
        $instance = new $class_name();

        return $instance->base_table ?? class_to_table_name($class_name);
    }

    public static function all($params) {
        $pdo = ConnectionPool::instance()->getConnection();
        $base_table = self::get_base_table();

        $order_by = isset($params['order_by']) ? 'ORDER BY ' .$params['order_by'] : '';

        $stmt = $pdo->prepare("SELECT * FROM $base_table $order_by");

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public static function create(Array $arr) {
        $pdo = ConnectionPool::instance()->getConnection();
        $base_table = self::get_base_table();

        $keys = array_keys($arr);
        $values = array_values($arr);
        $str_keys = implode(', ', $keys);

        $params = [];

        foreach($keys as $param) {
            $params[] = ':' . $param;
        }
        $str_params = implode(', ', $params);

        $stmt = $pdo->prepare("INSERT INTO $base_table ($str_keys) VALUES ($str_params)");

        foreach($arr as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        if(!$stmt->execute()) {
            print_log($stmt->errorInfo()[2]);
            return false;
        }
        return true;
    }

    static function find($param) {
        $pdo = ConnectionPool::instance()->getConnection();
        $base_table = self::get_base_table();

        $stmt = $pdo->prepare("SELECT * FROM $base_table WHERE id = :id LIMIT 1");
        $stmt->bindValue(":id", $param);

        if(!$stmt->execute()) {
            print_log($stmt->errorInfo()[2]);
            return null;
        }

        $recentRecord = $stmt->fetch(PDO::FETCH_ASSOC);
        return $recentRecord;
    }

    static function update($param, $new_value) {
        $pdo = ConnectionPool::instance()->getConnection();
        $base_table = self::get_base_table();

        
        $value_keys = array_keys($new_value);
        $param_keys = array_keys($param);

        $columns = implode(", ", array_map(function($item) {
            return "$item = :$item";
        }, $value_keys));

        $params = implode(", ", array_map(function($item) {
            return "$item = :$item";
        }, $param_keys));

        $stmt = $pdo->prepare("UPDATE $base_table SET $columns WHERE $params");

        foreach($new_value as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        foreach($param as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        if(!$stmt->execute()) {
            print_log($stmt->errorInfo()[2]);
            return false;
        }
        return true;
    }
}