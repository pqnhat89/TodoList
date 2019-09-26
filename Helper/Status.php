<?php
/**
 * Created by PhpStorm.
 * User: Phan Quang Nhat
 * Date: 9/26/2019
 * Time: 1:39 PM
 */

class Status
{
    // init status
    const PLANNING = 0;
    const DOING = 1;
    const COMPLETED = 2;

    // init status title
    private static $title = [
        self::PLANNING => '<span>PLANNING</span>',
        self::DOING => '<span class="text-primary">DOING</span>',
        self::COMPLETED => '<span class="text-success">COMPLETED</span>'
    ];

    /**
     * @param $status
     * @return mixed|null
     */
    public static function get($status = 0)
    {
        return self::$title[$status] ?? null;
    }
}