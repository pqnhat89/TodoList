<?php
/**
 * Created by PhpStorm.
 * User: Phan Quang Nhat
 * Date: 9/26/2019
 * Time: 12:49 PM
 */

require "../../Model/Work.php";

class WorkController
{
    public function index()
    {
        return (new Work())->all();
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
}