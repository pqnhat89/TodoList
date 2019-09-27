<?php
require "../../Model/Work.php";
if ($_POST['work_id']) {
    $result = (new Work())->update($_POST);
} else {
    $result = (new Work())->insert($_POST);
}
if ($result['error'] ?? null) {
    header("Location: /View/Work?error=" . $result['error']);
} else {
    header("Location: /View/Work?message=Update success !!!");
}