<?php
require "../../Model/Work.php";
$result = (new Work())->get($_GET['work_id']);
echo json_encode($result);