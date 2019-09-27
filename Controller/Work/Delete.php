<?php
require "../../Model/Work.php";
$result = (new Work())->delete($_POST['work_id']);
if ($result['error'] ?? null) {
    header("Location: /View/Work?error=" . $result['error']);
} else {
    header("Location: /View/Work?message=Delete success !!!");
}