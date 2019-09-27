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
    // init db connection
    private static $db;
    private static $conn;

    /**
     * Work constructor.
     */
    public function __construct()
    {
        // create db connection
        $db = new Database();
        // set db connection
        self::$db = $db;
        self::$conn = $db::$conn;
    }

    /**
     *
     */
    public function __destruct()
    {
        // disconnect db connection
        self::$db->disconnect();
    }

    /**
     * get all Work data
     * @return bool|mysqli_result
     */
    public function all()
    {
        $sql = "SELECT * FROM Work WHERE is_deleted=0";
        return self::$conn->query($sql);
    }

    /**
     * add new Work data
     * @param $data
     */
    public function insert($data)
    {
        $workName = $data['work_name'];
        $startDate = $data['start_date'];
        $endDate = $data['end_date'];
        $status = $data['status'];
        $sql = "INSERT INTO Work(work_name, start_date, end_date, status) VALUE ('$workName', '$startDate', '$endDate', '$status')";
        self::$conn->query($sql);
        header("Location: /View/Work");
    }

    /**
     * get Work data by work_id
     * @param $workId
     * @return mixed
     */
    public function get($workId)
    {
        $sql = "SELECT * FROM Work WHERE work_id=$workId LIMIT 1";
        $result = self::$conn->query($sql);
        foreach ($result as $r) {
            return $r;
        }
    }

    /**
     * update Work data by work_id
     * @param $data
     */
    public function update($data)
    {
        $workId = $data['work_id'];
        $workName = $data['work_name'];
        $startDate = $data['start_date'];
        $endDate = $data['end_date'];
        $status = $data['status'];
        $sql = "UPDATE Work SET work_name='$workName', start_date='$startDate', end_date='$endDate', status='$status', updated_at=NOW() WHERE work_id=$workId";
        self::$conn->query($sql);
        header("Location: /View/Work");
    }

    /**
     * soft delete Work data by work_id
     * @param $workId
     */
    public function delete($workId)
    {
        $sql = "UPDATE Work SET is_deleted=1 WHERE work_id=$workId";
        self::$conn->query($sql);
        header("Location: /View/Work");
    }
}