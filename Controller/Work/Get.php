<?php
require "../../Model/Work.php";
$result = (new Work())->get($_GET['work_id']);
$result['work_name'] = htmlspecialchars_decode($result['work_name']);
echo json_encode($result);