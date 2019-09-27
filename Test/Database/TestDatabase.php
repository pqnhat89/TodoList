<?php

require "../../Helper/Database.php";

/**
 * Created by PhpStorm.
 * User: Phan Quang Nhat
 * Date: 9/26/2019
 * Time: 11:45 AM
 */
class TestDatabase extends \PHPUnit\Framework\TestCase
{
    public function testConnection()
    {
        $db = new Database();
        $this->assertSame(!!$db::$conn, true);
        $db->disconnect();
    }

    public function testDisconnect()
    {
        $db = new Database();
        $db->disconnect();
        $this->assertSame($db::$conn, null);
    }
}