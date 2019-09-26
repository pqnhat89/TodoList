<?php

/**
 * Created by PhpStorm.
 * User: Phan Quang Nhat
 * Date: 9/26/2019
 * Time: 11:37 AM
 */
class Database
{
    /**
     * init connection variable
     * @var
     */
    public static $conn;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        // get env content
        $env = parse_ini_file("../.env");

        // get db settings
        $host = $env['host'];
        $username = $env['username'];
        $password = $env['password'];
        $dbname = $env['dbname'];

        // Create connection
        self::$conn = new mysqli($host, $username, $password, $dbname);

        // Check connection
        if (self::$conn->connect_error) {
            die("Connection failed: " . self::$conn->connect_error);
        }

        echo "Connection success";
    }

    /**
     * disconnect connection
     */
    public function disconnect()
    {
        self::$conn->close();
        self::$conn = null;
    }
}