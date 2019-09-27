<?php
require "../../Model/Work.php";
(new Work())->delete($_POST['work_id']);