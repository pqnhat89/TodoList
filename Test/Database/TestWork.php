<?php
/**
 * Created by PhpStorm.
 * User: Phan Quang Nhat
 * Date: 9/27/2019
 * Time: 11:28 AM
 */
require "../../Model/Work.php";

class TestWork extends \PHPUnit\Framework\TestCase
{
    private static $dataCreate = [
        'work_name' => 'Work Test',
        'start_date' => '2001-01-01',
        'end_date' => '2002-02-02',
        'status' => '0'
    ];

    private static $dataUpdate = [
        'work_name' => 'Work Test Updated',
        'start_date' => '2001-01-11',
        'end_date' => '2002-02-22',
        'status' => '1'
    ];

    public function testInsert()
    {
        // call func
        $work = new Work();
        $work->insert(self::$dataCreate);

        // get inserted data
        $result = self::getWork(self::$dataCreate);

        $this->assertSame($result['work_name'], self::$dataCreate['work_name']);
        $this->assertSame($result['start_date'], self::$dataCreate['start_date']);
        $this->assertSame($result['end_date'], self::$dataCreate['end_date']);
        $this->assertSame($result['status'], self::$dataCreate['status']);

        // delete data test
        self::deleteWork($result['work_id']);
    }

    public function testGet()
    {
        // create data test
        $workId = self::createWork(self::$dataCreate);

        // call func
        $work = new Work();
        $result = $work->get($workId);

        $this->assertSame($result['work_name'], self::$dataCreate['work_name']);
        $this->assertSame($result['start_date'], self::$dataCreate['start_date']);
        $this->assertSame($result['end_date'], self::$dataCreate['end_date']);
        $this->assertSame($result['status'], self::$dataCreate['status']);

        // delete data test
        self::deleteWork($workId);
    }

    public function testUpdate()
    {
        // create data test
        $workId = self::createWork(self::$dataCreate);

        // call func
        $work = new Work();
        $work->update(array_merge(self::$dataUpdate, ['work_id' => $workId]));

        // get updated data
        $result = self::getWorkById($workId);

        $this->assertSame($result['work_name'], self::$dataUpdate['work_name']);
        $this->assertSame($result['start_date'], self::$dataUpdate['start_date']);
        $this->assertSame($result['end_date'], self::$dataUpdate['end_date']);
        $this->assertSame($result['status'], self::$dataUpdate['status']);

        // delete data test
        self::deleteWork($workId);
    }

    public function testAll()
    {
        // create data test
        $workId = self::createWork(self::$dataCreate);

        // count all Work
        $db = new Database();
        $result = $db::$conn->query("SELECT COUNT(1) FROM Work WHERE is_deleted=0");
        $count = 0;
        foreach ($result as $r) {
            $count = $r['COUNT(1)'];
            break;
        }

        // call func
        $work = new Work();
        $works = $work->all();

        $this->assertSame(mysqli_num_rows($works), (int)$count);

        // delete data test
        self::deleteWork($workId);
    }

    public function testDelete()
    {
        // create data test
        $workId = self::createWork(self::$dataCreate);

        // call func
        $work = new Work();
        $work->delete($workId);

        // get id deleted
        $result = self::getWorkById($workId);

        $this->assertSame($result['is_deleted'], '1');

        // delete data test
        self::deleteWork($workId);
    }

    /**
     * helper func
     * @param $data
     * @return mixed
     */
    private static function createWork($data)
    {
        $db = new Database();
        $db::$conn->query("INSERT INTO Work(work_name, start_date, end_date, status) VALUE ('" . $data['work_name'] . "', '" . $data['start_date'] . "', '" . $data['end_date'] . "', '" . $data['status'] . "')");
        return $db::$conn->insert_id;
    }

    private static function getWork($data)
    {
        $db = new Database();
        $result = $db::$conn->query("SELECT * FROM Work WHERE work_name='" . $data['work_name'] . "' AND start_date='" . $data['start_date'] . "' AND end_date='" . $data['end_date'] . "' AND status=" . $data['status'] . " LIMIT 1");
        if ($result) {
            foreach ($result as $r) {
                return $r;
            }
        }
    }

    private static function getWorkById($workId)
    {
        $db = new Database();
        $result = $db::$conn->query("SELECT * FROM Work WHERE work_id=$workId");
        if ($result) {
            foreach ($result as $r) {
                return $r;
            }
        }
    }

    private static function deleteWork($workId)
    {
        $db = new Database();
        $db::$conn->query("DELETE FROM Work WHERE work_id=$workId");
    }
    /**
     * end helper func
     */
}