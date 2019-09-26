<?php
require "../../Model/Work.php";
if ($_POST['work_id']) {
    return (new Work())->update($_POST);
} else {
    return (new Work())->insert($_POST);
}
