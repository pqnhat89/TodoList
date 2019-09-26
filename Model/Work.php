<?php
/**
 * Created by PhpStorm.
 * User: Phan Quang Nhat
 * Date: 9/26/2019
 * Time: 12:48 PM
 */
require "../../Helper/Database.php";

class Work
{
    public function all()
    {
        $sql = "SELECT * FROM Work";
        return self::$conn->query($sql);
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function delete()
    {
        //
    }

    // init db connection
    private static $db;
    private static $conn;

    public function __construct()
    {
        // create db connection
        $db = new Database();
        // set db connection
        self::$db = $db;
        self::$conn = $db::$conn;
    }

    public function __destruct()
    {
        // disconnect db connection
        self::$db->disconnect();
    }
}